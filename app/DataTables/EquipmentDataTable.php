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
        $equipment = Equipment::query()
        	->with('firstRequiredBuilding')
        	->with('secondRequiredBuilding');

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
            'name' => ['title' => 'Equipment', 'name' => 'name', 'data' => 'name'],
            'price' => ['title' => 'Standard Price', 'name' => 'price', 'data' => 'price'],
            'units' => ['title' => 'Units', 'name' => 'units', 'data' => 'units'],
            'description' => ['title' => 'Description', 'name' => 'description', 'data' => 'description'],
            'weight' => ['visible' => false, 'title' => 'Weight (lbs)', 'name' => 'weight', 'data' => 'weight'],
            'cargo' => ['visible' => false, 'title' => 'Cargo Space', 'name' => 'cargo', 'data' => 'cargo'],
            'craft_gold' => ['visible' => false, 'title' => 'Gold to Craft', 'name' => 'craft_gold', 'data' => 'craft_gold'],
            'craft_iron' => ['visible' => false, 'title' => 'Iron to Craft', 'name' => 'craft_iron', 'data' => 'craft_iron'],
            'craft_timber' => ['visible' => false, 'title' => 'Timber to Craft', 'name' => 'craft_timber', 'data' => 'craft_timber'],
            'craft_stone' => ['visible' => false, 'title' => 'Stone to Craft', 'name' => 'craft_stone', 'data' => 'craft_stone'],
            'craft_grain' => ['visible' => false, 'title' => 'Grain to Craft', 'name' => 'craft_grain', 'data' => 'craft_grain'],
            'craft_actions' => ['visible' => false, 'title' => 'Actions to Craft', 'name' => 'craft_actions', 'data' => 'craft_actions'],
            'first_required_building_id' => ['visible' => false, 'title' => 'Building Required to Craft', 'name' => 'first_required_building_id', 'data' => 'first_required_building.name', 'defaultContent' => '-'],
            'second_required_building_id' => ['visible' => false, 'title' => 'Another Building Required to Craft', 'name' => 'second_required_building_id', 'data' => 'second_required_building.name', 'defaultContent' => '-'],
            'magic_type' => ['title' => 'Magic Item Type', 'name' => 'magic_type', 'data' => 'magic_type']
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
