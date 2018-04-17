<?php

namespace App\Repositories;

use App\Models\Persona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class personasRepository
 * @package App\Repositories
 * @version April 10, 2018, 4:02 pm MDT
 *
 * @method personas findWithoutFail($id, $columns = ['*'])
 * @method personas find($id, $columns = ['*'])
 * @method personas first($columns = ['*'])
*/
class personasRepository extends BaseRepository
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
        'race_id',
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
        'is_monarch',
        'fiefs_assigned',
        'shattered',
        'deceased'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
