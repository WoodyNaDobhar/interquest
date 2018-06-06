<?php

namespace App\Repositories;

use App\Models\EquipmentPersona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EquipmentPersonaRepository
 * @package App\Repositories
 * @version June 5, 2018, 8:53 pm MDT
 *
 * @method EquipmentPersona findWithoutFail($id, $columns = ['*'])
 * @method EquipmentPersona find($id, $columns = ['*'])
 * @method EquipmentPersona first($columns = ['*'])
*/
class EquipmentPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'equipment_id',
        'persona_id',
        'territory_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EquipmentPersona::class;
    }
}
