<?php

namespace App\DataTables;

use App\Models\Building;
use Form;
use Yajra\Datatables\Services\DataTable;

class buildingsDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'buildings.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $buildings = Building::query();

        return $this->applyScopes($buildings);
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
            'description' => ['name' => 'description', 'data' => 'description'],
            'cost_gold' => ['name' => 'cost_gold', 'data' => 'cost_gold'],
            'cost_iron' => ['name' => 'cost_iron', 'data' => 'cost_iron'],
            'cost_timber' => ['name' => 'cost_timber', 'data' => 'cost_timber'],
            'cost_stone' => ['name' => 'cost_stone', 'data' => 'cost_stone'],
            'cost_grain' => ['name' => 'cost_grain', 'data' => 'cost_grain'],
            'cost_actions' => ['name' => 'cost_actions', 'data' => 'cost_actions'],
            'expandable' => ['name' => 'expandable', 'data' => 'expandable'],
            'builds_maximum' => ['name' => 'builds_maximum', 'data' => 'builds_maximum'],
            'resource_required' => ['name' => 'resource_required', 'data' => 'resource_required'],
            'building_required' => ['name' => 'building_required', 'data' => 'building_required'],
            'waterway_required' => ['name' => 'waterway_required', 'data' => 'waterway_required']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'buildings';
    }
}
