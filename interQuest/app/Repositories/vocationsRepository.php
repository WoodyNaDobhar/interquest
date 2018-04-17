<?php

namespace App\Repositories;

use App\Models\Vocation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class vocationsRepository
 * @package App\Repositories
 * @version April 9, 2018, 10:00 pm MDT
 *
 * @method vocations findWithoutFail($id, $columns = ['*'])
 * @method vocations find($id, $columns = ['*'])
 * @method vocations first($columns = ['*'])
*/
class vocationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ability',
        'ability_description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vocation::class;
    }
}
