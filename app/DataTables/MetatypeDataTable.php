<?php

namespace App\DataTables;

use App\Models\Metatype;
use Form;
use Yajra\Datatables\Services\DataTable;

class MetatypeDataTable extends DataTable
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajax()
	{
		return $this->datatables
			->eloquent($this->query())
			->addColumn('action', 'metatypes.datatables_actions')
			->make(true);
	}

	/**
	 * Get the query object to be processed by datatables.
	 *
	 * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 */
	public function query()
	{
		$metatypes = Metatype::query();

		return $this->applyScopes($metatypes);
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
			'name' => ['title' => 'Metatype', 'name' => 'name', 'data' => 'name'],
			'description' => ['title' => 'Description', 'name' => 'description', 'data' => 'description'],
			'garb' => ['title' => 'Garb', 'name' => 'garb', 'data' => 'garb'],
			'type' => ['title' => 'Type', 'name' => 'type', 'data' => 'type'],
			'power' => ['title' => 'Power Level', 'name' => 'power', 'data' => 'power'],
			'level' => ['title' => 'Monster Level Required', 'name' => 'level', 'data' => 'level'],
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename()
	{
		return 'metatypes';
	}
}
