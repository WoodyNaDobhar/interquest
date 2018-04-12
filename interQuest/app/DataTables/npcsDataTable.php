<?php

namespace App\DataTables;

use App\Models\npcs;
use Form;
use Yajra\Datatables\Services\DataTable;

class npcsDataTable extends DataTable
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
        $npcs = npcs::query();

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
            'name' => ['name' => 'name', 'data' => 'name'],
            'private_name' => ['name' => 'private_name', 'data' => 'private_name'],
            'image' => ['name' => 'image', 'data' => 'image'],
            'vocation_id' => ['name' => 'vocation_id', 'data' => 'vocation_id'],
            'race_id' => ['name' => 'race_id', 'data' => 'race_id'],
            'background_public' => ['name' => 'background_public', 'data' => 'background_public'],
            'background_private' => ['name' => 'background_private', 'data' => 'background_private'],
            'territory_id' => ['name' => 'territory_id', 'data' => 'territory_id'],
            'gold' => ['name' => 'gold', 'data' => 'gold'],
            'iron' => ['name' => 'iron', 'data' => 'iron'],
            'timber' => ['name' => 'timber', 'data' => 'timber'],
            'stone' => ['name' => 'stone', 'data' => 'stone'],
            'grain' => ['name' => 'grain', 'data' => 'grain'],
            'action_id' => ['name' => 'action_id', 'data' => 'action_id'],
            'deceased' => ['name' => 'deceased', 'data' => 'deceased']
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
