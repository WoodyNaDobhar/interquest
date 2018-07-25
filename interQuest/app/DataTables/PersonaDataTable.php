<?php

namespace App\DataTables;

use Auth;
use App\Models\Persona;
use Form;
use Yajra\Datatables\Services\DataTable;

class PersonaDataTable extends DataTable
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajax()
	{
		return $this->datatables
			->eloquent($this->query())
			->addColumn('action', 'personae.datatables_actions')
			->make(true);
	}

	/**
	 * Get the query object to be processed by datatables.
	 *
	 * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 */
	public function query()
	{

		if(Auth::user()->is_admin || Auth::user()->is_mapkeeper){
			
			$personas = Persona::query()
				->with('vocation')
				->with('metatype')
				->with('park')
				->with('home')
				->with('defaultAction');
		}else{

			$personas = Persona::query()
				->with('vocation')
				->with('metatype')
				->with('park')
				->with('home');
		}

		return $this->applyScopes($personas);
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\Datatables\Html\Builder
	 */
	public function html($columns = null)
	{
		
		//column/button visibility
		$buttons = [
			'print',
			'reset',
			'reload',
			[
				 'extend'  => 'collection',
				 'text'	=> '<i class="fa fa-download"></i> Export',
				 'buttons' => [
					 'csv',
					 'excel',
					 'pdf',
				 ],
			],
			'colvis'
		];
		if($columns){
			$buttons = [
				[
					 'extend'  => 'collection',
					 'text'	=> '<i class="fa fa-download"></i> Export',
					 'buttons' => [
						 'csv',
						 'excel',
						 'pdf',
					 ],
				]
			];
		}
		return $this->builder()
			->columns($columns ? $columns : $this->getColumns())
			->addAction(['width' => $columns ? '27%' : '10%'])
			->ajax('')
			->parameters([
				'dom' => 'Bfrtip',
				'scrollX' => false,
				'buttons' => $buttons
			]);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	private function getColumns()
	{
		
		if(Auth::user()->is_admin || Auth::user()->is_mapkeeper){
			return [
				'name' => ['title' => 'Persona', 'name' => 'name', 'data' => 'name'],
				'long_name' => ['visible' => false, 'title' => 'Full Name', 'name' => 'long_name', 'data' => 'long_name'],
				'image' => ['title' => 'Image', 'name' => 'image', 'data' => 'image', 'render' => '"<img src=\"" + data + "\" width=\"50\"/>"'],
				'vocation_id' => ['title' => 'Vocation', 'name' => 'vocation_id', 'data' => 'vocation.name'],
				'metatype_id' => ['title' => 'Metatype', 'name' => 'metatype_id', 'data' => 'metatype.name'],
				'background_public' => ['visible' => false, 'title' => 'Public Background', 'name' => 'background_public', 'data' => 'background_public'],
				'background_private' => ['visible' => false, 'title' => 'Secret Background', 'name' => 'background_private', 'data' => 'background_private'],
				'park_id' => ['title' => 'Home Settlement', 'name' => 'park_id', 'data' => 'park.name'],
				'territory_id' => ['visible' => false, 'title' => 'Home Territory', 'name' => 'territory_id', 'data' => 'home.displayname'],
				'gold' => ['visible' => false, 'title' => 'Gold', 'name' => 'gold', 'data' => 'gold.total'],
				'iron' => ['visible' => false, 'title' => 'Iron', 'name' => 'iron', 'data' => 'iron.total'],
				'timber' => ['visible' => false, 'title' => 'Timber', 'name' => 'timber', 'data' => 'timber.total'],
				'stone' => ['visible' => false, 'title' => 'Stone', 'name' => 'stone', 'data' => 'stone.total'],
				'grain' => ['visible' => false, 'title' => 'Grain', 'name' => 'grain', 'data' => 'grain.total'],
				'action_id' => ['title' => 'Default Action', 'name' => 'action_id', 'data' => 'default_action.name'],
				'is_knight' => ['visible' => false, 'title' => 'Knight?', 'name' => 'is_knight', 'data' => 'is_knight'],
				'is_rebel' => ['visible' => false, 'title' => 'Rebel?', 'name' => 'is_rebel', 'data' => 'is_rebel'],
				'is_monarch' => ['visible' => false, 'title' => 'Monarch?', 'name' => 'is_monarch', 'data' => 'is_monarch'],
				'fiefs_assigned' => ['visible' => false, 'title' => 'Assigned Fiefs', 'name' => 'fiefs_assigned', 'data' => 'fiefs_assigned'],
				'shattered' => ['title' => 'Shattered On', 'name' => 'shattered', 'data' => 'shattered'],
				'deceased' => ['title' => 'Deceased On', 'name' => 'deceased', 'data' => 'deceased'],
				'orkID' => ['title' => 'ORK', 'name' => 'orkID', 'data' => 'orkID', 'render' => '"<a href=\"https://amtgard.com/ork/orkui/?Route=Player/index/" + data + "\" target=\"_blank\"/><i class=\"fa fa-external-link\"></a>"'],
				'validClaim' => ['visible' => false, 'title' => 'Claim Email', 'name' => 'validClaim', 'data' => 'validClaim']
			];
		}else{
			return [
				'name' => ['title' => 'Persona', 'name' => 'name', 'data' => 'name'],
				'image' => ['title' => 'Image', 'name' => 'image', 'data' => 'image', 'render' => '"<img src=\"" + data + "\" width=\"50\"/>"'],
				'vocation_id' => ['title' => 'Vocation', 'name' => 'vocation_id', 'data' => 'vocation.name'],
				'metatype_id' => ['title' => 'Metatype', 'name' => 'metatype_id', 'data' => 'metatype.name'],
				'background_public' => ['visible' => false, 'title' => 'Public Background', 'name' => 'background_public', 'data' => 'background_public'],
				'park_id' => ['title' => 'Home Settlement', 'name' => 'park_id', 'data' => 'park.name'],
				'territory_id' => ['title' => 'Home Territory', 'name' => 'territory_id', 'data' => 'home.displayname'],
				'is_knight' => ['title' => 'Knight?', 'name' => 'is_knight', 'data' => 'is_knight'],
				'is_rebel' => ['title' => 'Rebel?', 'name' => 'is_rebel', 'data' => 'is_rebel'],
				'is_monarch' => ['title' => 'Monarch?', 'name' => 'is_monarch', 'data' => 'is_monarch'],
				'fiefs_assigned' => ['visible' => false, 'title' => 'Assigned Fiefs', 'name' => 'fiefs_assigned', 'data' => 'fiefs_assigned'],
				'shattered' => ['visible' => false, 'title' => 'Shattered On', 'name' => 'shattered', 'data' => 'shattered'],
				'deceased' => ['visible' => false, 'title' => 'Deceased On', 'name' => 'deceased', 'data' => 'deceased'],
				'orkID' => ['title' => 'ORK', 'name' => 'orkID', 'data' => 'orkID', 'render' => '"<a href=\"https://amtgard.com/ork/orkui/?Route=Player/index/" + data + "\" target=\"_blank\"/><i class=\"fa fa-external-link\"></a>"']
			];
		}
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename()
	{
		return 'personas';
	}
}
