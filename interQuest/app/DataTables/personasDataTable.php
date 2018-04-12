<?php

namespace App\DataTables;

use App\Models\personas;
use Form;
use Yajra\Datatables\Services\DataTable;

class personasDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'personas.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $personas = personas::query();

        return $this->applyScopes($personas);
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
            'orkID' => ['name' => 'orkID', 'data' => 'orkID'],
            'user_id' => ['name' => 'user_id', 'data' => 'user_id'],
            'name' => ['name' => 'name', 'data' => 'name'],
            'long_name' => ['name' => 'long_name', 'data' => 'long_name'],
            'image' => ['name' => 'image', 'data' => 'image'],
            'vocation_id' => ['name' => 'vocation_id', 'data' => 'vocation_id'],
            'race_id' => ['name' => 'race_id', 'data' => 'race_id'],
            'background_public' => ['name' => 'background_public', 'data' => 'background_public'],
            'background_private' => ['name' => 'background_private', 'data' => 'background_private'],
            'park_id' => ['name' => 'park_id', 'data' => 'park_id'],
            'territory_id' => ['name' => 'territory_id', 'data' => 'territory_id'],
            'gold' => ['name' => 'gold', 'data' => 'gold'],
            'iron' => ['name' => 'iron', 'data' => 'iron'],
            'timber' => ['name' => 'timber', 'data' => 'timber'],
            'stone' => ['name' => 'stone', 'data' => 'stone'],
            'grain' => ['name' => 'grain', 'data' => 'grain'],
            'action_id' => ['name' => 'action_id', 'data' => 'action_id'],
            'is_knight' => ['name' => 'is_knight', 'data' => 'is_knight'],
            'is_rebel' => ['name' => 'is_rebel', 'data' => 'is_rebel'],
            'is_monarch' => ['name' => 'is_monarch', 'data' => 'is_monarch'],
            'fiefs_assigned' => ['name' => 'fiefs_assigned', 'data' => 'fiefs_assigned'],
            'shattered' => ['name' => 'shattered', 'data' => 'shattered'],
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
        return 'personas';
    }
}
