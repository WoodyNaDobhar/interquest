<?php

namespace App\Repositories;

use App\Models\equipments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class equipmentsRepository
 * @package App\Repositories
 * @version April 9, 2018, 9:43 pm MDT
 *
 * @method equipments findWithoutFail($id, $columns = ['*'])
 * @method equipments find($id, $columns = ['*'])
 * @method equipments first($columns = ['*'])
*/
class equipmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'units',
        'description',
        'weight',
        'cargo',
        'craft_gold',
        'craft_iron',
        'craft_timber',
        'craft_stone',
        'craft_grain',
        'craft_actions',
        'building_id',
        'is_artifact',
        'is_relic'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return equipments::class;
    }
}
