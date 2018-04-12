<?php

namespace App\Repositories;

use App\Models\sectors;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sectorsRepository
 * @package App\Repositories
 * @version April 10, 2018, 6:39 pm MDT
 *
 * @method sectors findWithoutFail($id, $columns = ['*'])
 * @method sectors find($id, $columns = ['*'])
 * @method sectors first($columns = ['*'])
*/
class sectorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'row',
        'column'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sectors::class;
    }
}
