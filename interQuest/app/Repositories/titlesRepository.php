<?php

namespace App\Repositories;

use App\Models\Title;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class titlesRepository
 * @package App\Repositories
 * @version April 9, 2018, 9:57 pm MDT
 *
 * @method titles findWithoutFail($id, $columns = ['*'])
 * @method titles find($id, $columns = ['*'])
 * @method titles first($columns = ['*'])
*/
class titlesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'is_landed',
        'fiefs_maximum'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Title::class;
    }
}
