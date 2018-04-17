<?php

namespace App\Repositories;

use App\Models\Fief;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class fievesRepository
 * @package App\Repositories
 * @version April 10, 2018, 5:31 pm MDT
 *
 * @method fieves findWithoutFail($id, $columns = ['*'])
 * @method fieves find($id, $columns = ['*'])
 * @method fieves first($columns = ['*'])
*/
class fievesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'territory_id',
        'fiefdom_id',
        'ruler_id',
        'ruler_type',
        'steward_id',
        'steward_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fief::class;
    }
}
