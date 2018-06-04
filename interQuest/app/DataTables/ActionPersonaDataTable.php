<?php

namespace App\DataTables;

use App\Models\ActionPersona;
use Form;
use Yajra\Datatables\Services\DataTable;

class ActionPersonaDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'action_personas.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $actionPersonas = ActionPersona::query();

        return $this->applyScopes($actionPersonas);
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
            'action_id' => ['name' => 'action_id', 'data' => 'action_id'],
            'persona_id' => ['name' => 'persona_id', 'data' => 'persona_id'],
            'source_territory_id' => ['name' => 'source_territory_id', 'data' => 'source_territory_id'],
            'target_territory_id' => ['name' => 'target_territory_id', 'data' => 'target_territory_id'],
            'result' => ['name' => 'result', 'data' => 'result']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'actionPersonas';
    }
}
