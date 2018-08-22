<?php

namespace App\Providers;

use Auth;
use Config;
use DB;
use Event;
use ChannelLog as Log;
use Schema;
use Validator;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Comment as Comments;
use App\Models\Revision as Revision;
use Storage;
use Flash;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\SomeEvent' => [
			'App\Listeners\EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		
		parent::boot($events);
		
		Event::listen(['eloquent.creating: *'], function(Eloquent $model) {
			
			//created by
			if(get_class($model) != 'App\Models\Revision'){
				if(in_array('created_by', Schema::getColumnListing($model->getTable()))){
					if($model->created_by == null){
						$model->created_by = Auth::user()->id;
					}
				}
			}
		});
		
		Event::listen(['eloquent.updating: *'], function(Eloquent $model) {
			
			//updated by
			if(in_array('updated_by', Schema::getColumnListing($model->getTable()))){
				$model->updated_by = Auth::user()->id;
			}
		});
		
		Event::listen(['eloquent.updated: *'], function(Eloquent $model){

			//revision tracking
				
			//find the changes
			$updates = array_diff_assoc($model->getAttributes(), $model->getOriginal());
				
			//ignore the revisionist fields
			unset($updates['created_at']);
			unset($updates['created_by']);
			unset($updates['updated_at']);
			unset($updates['updated_by']);
			unset($updates['deleted_at']);
			unset($updates['deleted_by']);
				
			//get the table schema stuff
			$schemaTable = DB::getDoctrineSchemaManager()
			->listTableDetails($model->getTable());
				
			//this is the one we want
			if($schemaTable->getName() == $model->getTable()){
			
				//iterate the columns
				foreach($schemaTable->getColumns() as $column){
			
					//do we add this one?  It's in the list, and the list didn't miss a 0=0=null='' issue
					if(array_key_exists($column->getName(), $updates) &&
							(
									(!array_key_exists($column->getName(), $model->getOriginal()) && array_key_exists($column->getName(), $model->getAttributes())) ||
									(!array_key_exists($column->getName(), $model->getAttributes()) && array_key_exists($column->getName(), $model->getOriginal())) ||
									$model->getOriginal()[$column->getName()] != $model->getAttributes()[$column->getName()]
							)
					){
			
						//reset revisionData
						$revisionData = array();
						$revisionData['tablename'] = $model->getTable();
						$revisionData['row'] = key_exists('id', $model->getOriginal()) ? $model->getOriginal()['id'] : NULL;
						$revisionData['column'] = $column->getName();
						$revisionData['previousIntValue'] = NULL;
						$revisionData['previousTinyintValue'] = NULL;
						$revisionData['previousFloatValue'] = NULL;
						$revisionData['previousVarcharValue'] = NULL;
						$revisionData['previousTextValue'] = NULL;
						$revisionData['previousdatetimeValue'] = NULL;
						$revisionData['newIntValue'] = NULL;
						$revisionData['newTinyintValue'] = NULL;
						$revisionData['newFloatValue'] = NULL;
						$revisionData['newVarcharValue'] = NULL;
						$revisionData['newTextValue'] = NULL;
						$revisionData['newdatetimeValue'] = NULL;
			
						//add based on column type if the column exists
						if(array_key_exists($column->getName(), $model->getOriginal())){
			
							//integer
							if($column->getType()->getName() == 'integer' ||
									$column->getType()->getName() == 'bigint' ||
									$column->getType()->getName() == 'smallint'){
			
								//add values
								$revisionData['previousIntValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newIntValue'] = $model->getAttributes()[$column->getName()];
			
								//tinyint
							}elseif($column->getType()->getName() == 'boolean'){
			
								//add values
								$revisionData['previousTinyintValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newTinyintValue'] = $model->getAttributes()[$column->getName()];
			
								//float
							}elseif($column->getType()->getName() == 'float' ||
									$column->getType()->getName() == 'decimal'){
			
								//add values
								$revisionData['previousFloatValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newFloatValue'] = $model->getAttributes()[$column->getName()];
			
								//varchar
							}elseif($column->getType()->getName() == 'string'){
			
								//add values
								$revisionData['previousVarcharValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newVarcharValue'] = $model->getAttributes()[$column->getName()];
			
								//text
							}elseif($column->getType()->getName() == 'text'){
			
								//add values
								$revisionData['previousTextValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newTextValue'] = $model->getAttributes()[$column->getName()];
			
								//datetime
							}elseif($column->getType()->getName() == 'datetime' ||
									$column->getType()->getName() == 'date'){
			
								//add values
								$revisionData['previousdatetimeValue'] = $model->getOriginal()[$column->getName()];
								$revisionData['newdatetimeValue'] = $model->getAttributes()[$column->getName()];
							}
								
							//validate
							$revisionValidator = Validator::make($data = $revisionData, Revision::$rules);
							if(!$revisionValidator->fails()){
			
								//make it
								$revision = new Revision;
								$revision->tablename = $revisionData['tablename'];
								$revision->row = $revisionData['row'];
								$revision->column = $revisionData['column'];
								$revision->previousIntValue = $revisionData['previousIntValue'];
								$revision->previousTinyintValue = $revisionData['previousTinyintValue'];
								$revision->previousFloatValue = $revisionData['previousFloatValue'];
								$revision->previousVarcharValue = $revisionData['previousVarcharValue'];
								$revision->previousTextValue = $revisionData['previousTextValue'];
								$revision->previousdatetimeValue = $revisionData['previousdatetimeValue'];
								$revision->newIntValue = $revisionData['newIntValue'];
								$revision->newTinyintValue = $revisionData['newTinyintValue'];
								$revision->newFloatValue = $revisionData['newFloatValue'];
								$revision->newVarcharValue = $revisionData['newVarcharValue'];
								$revision->newTextValue = $revisionData['newTextValue'];
								$revision->newdatetimeValue = $revisionData['newdatetimeValue'];
								$revision->created_at = Carbon::now();
								$revision->created_by = Auth::user()->id;
								$revision->save();
							}else{
								dd(array(
										'error'		=> $revisionValidator->errors(),
										'original'	=> $model->getOriginal(),
										'new'		=> $model->getAttributes()
									));
								//log it
								Log::write('failedRevisions', $model->getTable() . ' failed to update revision: ');
								Log::write('failedRevisions', json_encode(
									array(
										'error'		=> $revisionValidator->errors(),
										'original'	=> $model->getOriginal(),
										'new'		=> $model->getAttributes()
									)
								));
							}
						}
					}
				}
			}
		});
		
		Event::listen(['eloquent.saving: *'], function(Eloquent $model) {

			//check for an 'image' field
			if(request()->hasFile('image') && Schema::hasColumn($model->getTable(), 'image')){
				
				//put it in storage
				Storage::put(
					'public/' . $model->getTable() . '/'. $model->id . '.' . request()->file('image')->getClientOriginalExtension(),
					file_get_contents(request()->file('image')->getRealPath())
				);
				
				//update image field to 'file'
				$model->image = 'file';
			}
		});
		
		Event::listen(['eloquent.saved: *'], function(Eloquent $model) {
			
// 			//setup
// 			$newCommentRelations = request()->input('newComment_id');
			
// 			//if there are comments
// 			if($newCommentRelations){
			
// 				//generate the list of related models
// 				foreach(Schema::getColumnListing('comments') as $column){
// 					if(strpos($column, '_id')){
// 						//add the column name, sans the _id, but plus 's', to match the table name
// 						//brand_product isn't exactly in compliance with naming conventions, so we're adding some stuff to manage that.
// 						//TODO: Laravel has a function for this...do that instead.
// 						$relatedModels[] = str_replace('brandproducts', 'brand_product', str_replace('_id', '', $column . 's'));
// 					}
// 				}
	
// 				//if it's a commentable model item
// 				if(in_array($model->getTable(), $relatedModels)){
	
// 					//iterate the array of arrays
// 					foreach($newCommentRelations as $attachTable => $commentIDs){
						
// 						//is this the one we're on? compare curren table name with a more compliant version of our attachTable
// 						if($model->getTable() == str_replace('brandproducts', 'brand_product', $attachTable . 's')){
	
// 							//make the attachTo column name compliant
// 							$attachTo = $attachTable . '_id';
								
// 							//attach it
// 							foreach($commentIDs as $newComment){
// 								$comment = Comment::findOrFail($newComment);
// 								$comment->$attachTo = $model->id;
// 								$comment->save();
// 							}
// 						}
// 					}
// 				}
// 			}
		});
		
		Event::listen(['eloquent.deleting: *'], function(Eloquent $model) {
			
			//deleted by
			if(in_array('deleted_by', Schema::getColumnListing($model->getTable()))){
				$model->deleted_by = Auth::user()->id;
				$model->save();
			}
		});
	}
}
