<?php

namespace App\Repositories;

use App\Models\Metatype;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MetatypeRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:37 pm MDT
 *
 * @method Metatype findWithoutFail($id, $columns = ['*'])
 * @method Metatype find($id, $columns = ['*'])
 * @method Metatype first($columns = ['*'])
*/
class MetatypeRepository extends BaseRepository
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
        return Metatype::class;
    }
}
