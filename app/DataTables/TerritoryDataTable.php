<?php

namespace App\DataTables;

use App\Models\Territory;
use Form;
use Yajra\Datatables\Services\DataTable;

class TerritoryDataTable extends DataTable
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
        $territories = Territory::query()
        	->with('terrain');

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
            'name' => ['title' => 'Territory', 'name' => 'name', 'data' => 'name'],
            'row' => ['title' => 'Latitude', 'name' => 'row', 'data' => 'row'],
            'column' => ['title' => 'Longitude', 'name' => 'column', 'data' => 'column'],
            'terrain_id' => ['title' => 'Terrain', 'name' => 'terrain_id', 'data' => 'terrain.name'],
            'primary_resource' => ['title' => 'First Resource', 'name' => 'primary_resource', 'data' => 'primary_resource'],
            'secondary_resource' => ['title' => 'Second Resource', 'name' => 'secondary_resource', 'data' => 'secondary_resource'],
            'castle_strength' => ['title' => 'Castle Strength', 'name' => 'castle_strength', 'data' => 'castle_strength'],
            'gold' => ['visible' => false, 'title' => 'Gold', 'name' => 'gold', 'data' => 'gold'],
            'iron' => ['visible' => false, 'title' => 'Iron', 'name' => 'iron', 'data' => 'iron'],
            'timber' => ['visible' => false, 'title' => 'Timber', 'name' => 'timber', 'data' => 'timber'],
            'stone' => ['visible' => false, 'title' => 'Stone', 'name' => 'stone', 'data' => 'stone'],
            'grain' => ['visible' => false, 'title' => 'Grain', 'name' => 'grain', 'data' => 'grain'],
            'is_wasteland' => ['title' => 'Wasteland?', 'name' => 'is_wasteland', 'data' => 'is_wasteland'],
            'is_no_mans_land' => ['title' => 'No Man\'s Land', 'name' => 'is_no_mans_land', 'data' => 'is_no_mans_land']
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
