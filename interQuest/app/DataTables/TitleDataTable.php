<?php

namespace App\DataTables;

use App\Models\Title;
use Form;
use Yajra\Datatables\Services\DataTable;

class TitleDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'titles.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $titles = Title::query();

        return $this->applyScopes($titles);
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
            'name' => ['title' => 'Title', 'name' => 'name', 'data' => 'name'],
            'is_landed' => ['title' => 'Landed', 'name' => 'is_landed', 'data' => 'is_landed'],
            'hierarchy' => ['title' => 'Order of Procession', 'name' => 'hierarchy', 'data' => 'hierarchy'],
            'fiefs_maximum' => ['title' => 'Fief Rights', 'name' => 'fiefs_maximum', 'data' => 'fiefs_maximum']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'titles';
    }
}
