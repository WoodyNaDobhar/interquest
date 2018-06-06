<?php

namespace App\Repositories;

use App\Models\Equipment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EquipmentRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:34 pm MDT
 *
 * @method Equipment findWithoutFail($id, $columns = ['*'])
 * @method Equipment find($id, $columns = ['*'])
 * @method Equipment first($columns = ['*'])
*/
class EquipmentRepository extends BaseRepository
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
        'first_required_building_id',
        'second_required_building_id',
        'magic_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Equipment::class;
    }
}
