<?php

namespace App\Repositories;

use App\Models\Building;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BuildingRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:33 pm MDT
 *
 * @method Building findWithoutFail($id, $columns = ['*'])
 * @method Building find($id, $columns = ['*'])
 * @method Building first($columns = ['*'])
*/
class BuildingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'cost_gold',
        'cost_iron',
        'cost_timber',
        'cost_stone',
        'cost_grain',
        'cost_actions',
        'expandable',
        'builds_maximum',
        'resource_required',
        'building_required',
        'waterway_required'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Building::class;
    }
}
