<?php

namespace App\DataTables;

use App\Models\Action;
use Form;
use Yajra\Datatables\Services\DataTable;

class ActionDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'actions.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $actions = Action::query();

        return $this->applyScopes($actions);
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
            'name' => ['title' => 'Action', 'name' => 'name', 'data' => 'name'],
            'description' => ['title' => 'Description', 'name' => 'description', 'data' => 'description'],
            'is_common' => ['title' => 'Common', 'name' => 'is_common', 'data' => 'is_common'],
            'is_landed' => ['title' => 'Landed', 'name' => 'is_landed', 'data' => 'is_landed'],
            'check_required' => ['title' => 'Check Req', 'name' => 'check_required', 'data' => 'check_required']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'actions';
    }
}
