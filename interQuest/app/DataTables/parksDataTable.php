<?php

namespace App\DataTables;

use App\Models\Park;
use Form;
use Yajra\Datatables\Services\DataTable;

class parksDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'parks.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $parks = Park::query();

        return $this->applyScopes($parks);
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
            'name' => ['name' => 'name', 'data' => 'name'],
            'rank' => ['name' => 'rank', 'data' => 'rank'],
            'lat' => ['name' => 'lat', 'data' => 'lat'],
            'lon' => ['name' => 'lon', 'data' => 'lon'],
            'midreign' => ['name' => 'midreign', 'data' => 'midreign'],
            'coronation' => ['name' => 'coronation', 'data' => 'coronation']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'parks';
    }
}
