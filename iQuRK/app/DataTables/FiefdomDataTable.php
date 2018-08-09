<?php

namespace App\DataTables;

use App\Models\Fiefdom;
use Form;
use Yajra\Datatables\Services\DataTable;

class FiefdomDataTable extends DataTable
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajax()
	{
		return $this->datatables
			->eloquent($this->query())
			->addColumn('action', 'fiefdoms.datatables_actions')
			->make(true);
	}

	/**
	 * Get the query object to be processed by datatables.
	 *
	 * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 */
	public function query()
	{
		$fiefdoms = Fiefdom::query()
			->with('ruler');

		return $this->applyScopes($fiefdoms);
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
			'name' => ['title' => 'Fiefdom', 'name' => 'name', 'data' => 'name'],
			'image' => ['title' => 'Image', 'name' => 'image', 'data' => 'image', 'render' => '"<img src=\"" + data + "\" width=\"50\"/>"'],
			'ruler_id' => ['title' => 'Ruler', 'name' => 'ruler_id', 'data' => 'ruler.name'],
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
		return 'fiefdoms';
	}
}
