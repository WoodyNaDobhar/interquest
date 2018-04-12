<?php

namespace App\DataTables;

use App\Models\comments;
use Form;
use Yajra\Datatables\Services\DataTable;

class commentsDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'comments.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $comments = comments::query();

        return $this->applyScopes($comments);
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
            'commented_id' => ['name' => 'commented_id', 'data' => 'commented_id'],
            'commented_type' => ['name' => 'commented_type', 'data' => 'commented_type'],
            'author_persona_id' => ['name' => 'author_persona_id', 'data' => 'author_persona_id'],
            'subject' => ['name' => 'subject', 'data' => 'subject'],
            'message' => ['name' => 'message', 'data' => 'message'],
            'show_mapkeepers' => ['name' => 'show_mapkeepers', 'data' => 'show_mapkeepers']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'comments';
    }
}
