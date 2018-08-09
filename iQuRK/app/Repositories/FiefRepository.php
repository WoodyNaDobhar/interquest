<?php

namespace App\Repositories;

use App\Models\Fief;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FiefRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:35 pm MDT
 *
 * @method Fief findWithoutFail($id, $columns = ['*'])
 * @method Fief find($id, $columns = ['*'])
 * @method Fief first($columns = ['*'])
*/
class FiefRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'territory_id',
        'fiefdom_id',
        'fiefdom_type',
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
