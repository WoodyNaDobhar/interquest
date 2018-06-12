<?php

namespace App\DataTables;

use App\Models\Npc;
use Form;
use Yajra\Datatables\Services\DataTable;

class NpcDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'npcs.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $npcs = Npc::query()
        	->with('vocation')
        	->with('race');

        return $this->applyScopes($npcs);
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
            'name' => ['title' => 'NPC', 'name' => 'name', 'data' => 'name'],
            'private_name' => ['visible' => false, 'title' => 'Secret Name', 'name' => 'private_name', 'data' => 'private_name'],
            'image' => ['title' => 'Image', 'name' => 'image', 'data' => 'image', 'render' => '"<img src=\"" + data + "\" width=\"50\"/>"'],
            'vocation_id' => ['title' => 'Vocation', 'name' => 'vocation_id', 'data' => 'vocation.name'],
            'race_id' => ['title' => 'Race', 'name' => 'race_id', 'data' => 'race.name'],
            'background_public' => ['visible' => false, 'title' => 'Public Background', 'name' => 'background_public', 'data' => 'background_public'],
            'background_private' => ['visible' => false, 'title' => 'Secret Background', 'name' => 'background_private', 'data' => 'background_private'],
			'park_id' => ['title' => 'Mapkeeper Park', 'name' => 'park_id', 'data' => 'park.name'],
            'territory_id' => ['title' => 'Home Territory', 'name' => 'territory_id', 'data' => 'home.name'],
            'gold' => ['visible' => false, 'title' => 'Gold', 'name' => 'gold', 'data' => 'gold.total'],
            'iron' => ['visible' => false, 'title' => 'Iron', 'name' => 'iron', 'data' => 'iron.total'],
            'timber' => ['visible' => false, 'title' => 'Timber', 'name' => 'timber', 'data' => 'timber.total'],
            'stone' => ['visible' => false, 'title' => 'Stone', 'name' => 'stone', 'data' => 'stone.total'],
            'grain' => ['visible' => false, 'title' => 'Grain', 'name' => 'grain', 'data' => 'grain.total'],
            'action_id' => ['title' => 'Default Action', 'name' => 'action_id', 'data' => 'default_action.name'],
            'deceased' => ['title' => 'Deceased', 'name' => 'deceased', 'data' => 'deceased']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'npcs';
    }
}
