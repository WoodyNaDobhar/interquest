<?php

namespace App\Repositories;

use App\Models\Race;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RaceRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:37 pm MDT
 *
 * @method Race findWithoutFail($id, $columns = ['*'])
 * @method Race find($id, $columns = ['*'])
 * @method Race first($columns = ['*'])
*/
class RaceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'personable'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Race::class;
    }
}
