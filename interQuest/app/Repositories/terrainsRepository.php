<?php

namespace App\Repositories;

use App\Models\terrains;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class terrainsRepository
 * @package App\Repositories
 * @version April 9, 2018, 9:53 pm MDT
 *
 * @method terrains findWithoutFail($id, $columns = ['*'])
 * @method terrains find($id, $columns = ['*'])
 * @method terrains first($columns = ['*'])
*/
class terrainsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'image',
        'color',
        'css'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return terrains::class;
    }
}
