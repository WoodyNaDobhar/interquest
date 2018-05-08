<?php

namespace App\Repositories;

use App\Models\Territory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TerritoryRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:38 pm MDT
 *
 * @method Territory findWithoutFail($id, $columns = ['*'])
 * @method Territory find($id, $columns = ['*'])
 * @method Territory first($columns = ['*'])
*/
class TerritoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'row',
        'column',
        'terrain_id',
        'primary_resource',
        'secondary_resource',
        'castle_strength',
        'gold',
        'iron',
        'timber',
        'stone',
        'grain',
        'is_wasteland',
        'is_no_mans_land'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Territory::class;
    }
}
