<?php

namespace App\DataTables;

use App\Models\Fief;
use Form;
use Yajra\Datatables\Services\DataTable;

class FiefDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'fiefs.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $fiefs = Fief::query();

        return $this->applyScopes($fiefs);
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
            	'responsive' => true,
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
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
            'name' => ['name' => 'name', 'data' => 'name'],
            'territory_id' => ['name' => 'territory_id', 'data' => 'territory_id'],
            'fiefdom_id' => ['name' => 'fiefdom_id', 'data' => 'fiefdom_id'],
            'fiefdom_type' => ['name' => 'fiefdom_type', 'data' => 'fiefdom_type'],
            'ruler_id' => ['name' => 'ruler_id', 'data' => 'ruler_id'],
            'ruler_type' => ['name' => 'ruler_type', 'data' => 'ruler_type'],
            'steward_id' => ['name' => 'steward_id', 'data' => 'steward_id'],
            'steward_type' => ['name' => 'steward_type', 'data' => 'steward_type']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'fiefs';
    }
}
