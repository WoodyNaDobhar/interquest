<?php

namespace App\DataTables;

use App\Models\Building;
use Form;
use Yajra\Datatables\Services\DataTable;

class BuildingDataTable extends DataTable
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
            'name' => ['title' => 'Building', 'name' => 'name', 'data' => 'name'],
            'description' => ['title' => 'Description', 'name' => 'description', 'data' => 'description'],
            'cost_gold' => ['visible' => false, 'title' => 'Gold To Build', 'name' => 'cost_gold', 'data' => 'cost_gold'],
            'cost_iron' => ['visible' => false, 'title' => 'Iron To Build', 'name' => 'cost_iron', 'data' => 'cost_iron'],
            'cost_timber' => ['visible' => false, 'title' => 'Timber To Build', 'name' => 'cost_timber', 'data' => 'cost_timber'],
            'cost_stone' => ['visible' => false, 'title' => 'Stone To Build', 'name' => 'cost_stone', 'data' => 'cost_stone'],
            'cost_grain' => ['visible' => false, 'title' => 'Grain To Build', 'name' => 'cost_grain', 'data' => 'cost_grain'],
            'cost_actions' => ['visible' => false, 'title' => 'Actions To Build', 'name' => 'cost_actions', 'data' => 'cost_actions'],
            'expandable' => ['visible' => false, 'title' => 'Expands', 'name' => 'expandable', 'data' => 'expandable'],
            'builds_maximum' => ['visible' => false, 'title' => 'Max Expands', 'name' => 'builds_maximum', 'data' => 'builds_maximum'],
            'resource_required' => ['visible' => false, 'title' => 'Territory Resource Required', 'name' => 'resource_required', 'data' => 'resource_required'],
            'building_required' => ['visible' => false, 'title' => 'Territory Building Required', 'name' => 'building_required', 'data' => 'building_required'],
            'waterway_required' => ['visible' => false, 'title' => 'Territory Waterway Required', 'name' => 'waterway_required', 'data' => 'waterway_required']
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
