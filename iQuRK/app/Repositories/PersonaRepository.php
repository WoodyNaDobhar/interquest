<?php

namespace App\Repositories;

use App\Models\Persona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:36 pm MDT
 *
 * @method Persona findWithoutFail($id, $columns = ['*'])
 * @method Persona find($id, $columns = ['*'])
 * @method Persona first($columns = ['*'])
*/
class PersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'orkID',
        'user_id',
        'name',
        'long_name',
        'image',
        'vocation_id',
        'metatype_id',
        'background_public',
        'background_private',
        'park_id',
        'territory_id',
        'gold',
        'iron',
        'timber',
        'stone',
        'grain',
        'action_id',
        'is_knight',
        'is_rebel',
        'fiefs_assigned',
        'shattered',
        'deceased',
        'validClaim'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
