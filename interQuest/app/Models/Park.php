<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Park
 * @package App\Models
 * @version May 8, 2018, 2:36 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property integer orkID
 * @property string name
 * @property string rank
 * @property integer territory_id
 * @property date midreign
 * @property date coronation
 */
class Park extends Model
{
	use SoftDeletes;

	public $table = 'parks';
	
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';


	protected $dates = ['deleted_at'];


	public $fillable = [
		'orkID',
		'name',
		'rank',
		'territory_id',
		'midreign',
		'coronation'
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'orkID' => 'integer',
		'name' => 'string',
		'rank' => 'string',
		'territory_id' => 'integer',
		'midreign' => 'date',
		'coronation' => 'date'
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		
	];

	/**
	 * Accessors & Mutators
	 */
	public function getMapkeeperAttribute()
	{
		
		$response = null;
		$mk = $this->personae()
			->whereHas('User', function($q){
				$q->where('is_mapkeeper', '=', 1);
			})
			->orderBy('created_at', 'DESC')
			->first();
		
		if($mk){
			return $mk;
		}else{
			return null;
		}
	}
	public function getMonarchAttribute()
	{
		return $this->personae()
			->whereHas('user', function($query){
				$query->where('is_monarch', 1);
			})
			->first();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function personae()
	{
		return $this->hasMany(\App\Models\Persona::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphMany
	 **/
	public function fiefs()
	{
		return $this->morphMany('\App\Models\Fief', 'fiefdom');
}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function capital()
	{
		return $this->belongsTo(\App\Models\Territory::class, 'territory_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphMany
	 **/
	public function comments()
	{
		return $this->morphMany('\App\Models\Comment', 'commented');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphMany
	 **/
	public function revisions()
	{
		return $this->morphMany('\App\Models\Revision', 'changed');
	}
}
