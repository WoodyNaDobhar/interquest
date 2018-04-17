<?php

namespace App\DataTables;

use App\Models\Territory;
use Form;
use Yajra\Datatables\Services\DataTable;

class territoriesDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'territories.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $territories = Territory::query();

        return $this->applyScopes($territories);
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
            'row' => ['name' => 'row', 'data' => 'row'],
            'column' => ['name' => 'column', 'data' => 'column'],
            'terrain_id' => ['name' => 'terrain_id', 'data' => 'terrain_id'],
            'primary_resource' => ['name' => 'primary_resource', 'data' => 'primary_resource'],
            'secondary_resource' => ['name' => 'secondary_resource', 'data' => 'secondary_resource'],
            'castle_strength' => ['name' => 'castle_strength', 'data' => 'castle_strength'],
            'is_wasteland' => ['name' => 'is_wasteland', 'data' => 'is_wasteland'],
            'is_no_mans_land' => ['name' => 'is_no_mans_land', 'data' => 'is_no_mans_land'],
            'has_road' => ['name' => 'has_road', 'data' => 'has_road']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'territories';
    }
}
