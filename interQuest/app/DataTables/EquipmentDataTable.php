<?php

namespace App\DataTables;

use App\Models\Equipment;
use Form;
use Yajra\Datatables\Services\DataTable;

class EquipmentDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'equipment.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $equipment = Equipment::query();

        return $this->applyScopes($equipment);
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
            'price' => ['name' => 'price', 'data' => 'price'],
            'units' => ['name' => 'units', 'data' => 'units'],
            'description' => ['name' => 'description', 'data' => 'description'],
            'weight' => ['name' => 'weight', 'data' => 'weight'],
            'cargo' => ['name' => 'cargo', 'data' => 'cargo'],
            'craft_gold' => ['name' => 'craft_gold', 'data' => 'craft_gold'],
            'craft_iron' => ['name' => 'craft_iron', 'data' => 'craft_iron'],
            'craft_timber' => ['name' => 'craft_timber', 'data' => 'craft_timber'],
            'craft_stone' => ['name' => 'craft_stone', 'data' => 'craft_stone'],
            'craft_grain' => ['name' => 'craft_grain', 'data' => 'craft_grain'],
            'craft_actions' => ['name' => 'craft_actions', 'data' => 'craft_actions'],
            'building_id' => ['name' => 'building_id', 'data' => 'building_id'],
            'magic_type' => ['name' => 'magic_type', 'data' => 'magic_type']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'equipment';
    }
}
