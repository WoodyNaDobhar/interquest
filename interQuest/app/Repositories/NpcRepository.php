<?php

namespace App\Repositories;

use App\Models\Npc;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NpcRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:35 pm MDT
 *
 * @method Npc findWithoutFail($id, $columns = ['*'])
 * @method Npc find($id, $columns = ['*'])
 * @method Npc first($columns = ['*'])
*/
class NpcRepository extends BaseRepository
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
        return Npc::class;
    }
}
