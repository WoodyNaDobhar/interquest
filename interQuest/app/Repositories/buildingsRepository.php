<?php

namespace App\Repositories;

use App\Models\Building;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class buildingsRepository
 * @package App\Repositories
 * @version April 9, 2018, 9:41 pm MDT
 *
 * @method buildings findWithoutFail($id, $columns = ['*'])
 * @method buildings find($id, $columns = ['*'])
 * @method buildings first($columns = ['*'])
*/
class buildingsRepository extends BaseRepository
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
