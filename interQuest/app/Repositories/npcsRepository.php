<?php

namespace App\Repositories;

use App\Models\npcs;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class npcsRepository
 * @package App\Repositories
 * @version April 9, 2018, 9:47 pm MDT
 *
 * @method npcs findWithoutFail($id, $columns = ['*'])
 * @method npcs find($id, $columns = ['*'])
 * @method npcs first($columns = ['*'])
*/
class npcsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'private_name',
        'image',
        'vocation_id',
        'race_id',
        'background_public',
        'background_private',
        'territory_id',
        'gold',
        'iron',
        'timber',
        'stone',
        'grain',
        'action_id',
        'deceased'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return npcs::class;
    }
}
