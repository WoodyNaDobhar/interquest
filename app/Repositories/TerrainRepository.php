<?php

namespace App\Repositories;

use App\Models\Terrain;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TerrainRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:37 pm MDT
 *
 * @method Terrain findWithoutFail($id, $columns = ['*'])
 * @method Terrain find($id, $columns = ['*'])
 * @method Terrain first($columns = ['*'])
*/
class TerrainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Terrain::class;
    }
}
