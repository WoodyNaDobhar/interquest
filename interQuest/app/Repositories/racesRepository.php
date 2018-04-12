<?php

namespace App\Repositories;

use App\Models\races;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class racesRepository
 * @package App\Repositories
 * @version April 10, 2018, 6:07 pm MDT
 *
 * @method races findWithoutFail($id, $columns = ['*'])
 * @method races find($id, $columns = ['*'])
 * @method races first($columns = ['*'])
*/
class racesRepository extends BaseRepository
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
        return races::class;
    }
}
