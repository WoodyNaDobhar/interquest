<?php

namespace App\Repositories;

use App\Models\Vocation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VocationRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:39 pm MDT
 *
 * @method Vocation findWithoutFail($id, $columns = ['*'])
 * @method Vocation find($id, $columns = ['*'])
 * @method Vocation first($columns = ['*'])
*/
class VocationRepository extends BaseRepository
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
