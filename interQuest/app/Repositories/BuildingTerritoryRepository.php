<?php

namespace App\Repositories;

use App\Models\BuildingTerritory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BuildingTerritoryRepository
 * @package App\Repositories
 * @version June 4, 2018, 6:54 pm MDT
 *
 * @method BuildingTerritory findWithoutFail($id, $columns = ['*'])
 * @method BuildingTerritory find($id, $columns = ['*'])
 * @method BuildingTerritory first($columns = ['*'])
*/
class BuildingTerritoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'building_id',
        'territory_id',
        'size'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BuildingTerritory::class;
    }
}
