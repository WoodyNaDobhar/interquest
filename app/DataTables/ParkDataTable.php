<?php

namespace App\DataTables;

use App\Models\Park;
use Form;
use Yajra\Datatables\Services\DataTable;

class ParkDataTable extends DataTable
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajax()
	{
		return $this->datatables
			->eloquent($this->query())
			->addColumn('action', 'parks.datatables_actions')
			->make(true);
	}

	/**
	 * Get the query object to be processed by datatables.
	 *
	 * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 */
	public function query()
	{
		$parks = Park::query()
			->with('capital')
			->with('ruler');

		return $this->applyScopes($parks);
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\Datatables\Html\Builder
	 */
	public function html()
	{
		return $this->builder()
			->columns($this->getColumns())
			->addAction(['width' => '10%'])
			->ajax('')
			->parameters([
				'dom' => 'Bfrtip',
				'scrollX' => false,
				'buttons' => [
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
				]
			]);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	private function getColumns()
	{
		return [
			'orkID' => ['title' => 'ORK', 'name' => 'orkID', 'data' => 'orkID', 'render' => '"<a href=\"https://amtgard.com/ork/orkui/?Route=Park/index/" + data + "\" target=\"_blank\"/><i class=\"fa fa-external-link\"></a>"'],
			'name' => ['title' => 'Settlement', 'name' => 'name', 'data' => 'name'],
			'rank' => ['title' => 'Size', 'name' => 'rank', 'data' => 'rank'],
			'territory_id' => ['title' => 'Capital', 'name' => 'territory_id', 'data' => 'capital.displayname'],
			'midreign' => ['title' => 'Midreign', 'name' => 'midreign', 'data' => 'midreign'],
			'coronation' => ['title' => 'Coronation', 'name' => 'coronation', 'data' => 'coronation'],
			'ruler_id' => ['title' => 'Ruler', 'name' => 'ruler_id', 'data' => 'ruler.name', 'defaultContent' => 'None!'],
			'ruler_type' => ['title' => 'Ruler Type', 'name' => 'ruler_type', 'data' => 'ruler_type']
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename()
	{
		return 'parks';
	}
}
