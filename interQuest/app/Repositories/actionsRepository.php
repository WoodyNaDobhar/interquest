<?php

namespace App\Repositories;

use App\Models\Action;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class actionsRepository
 * @package App\Repositories
 * @version April 10, 2018, 3:40 pm MDT
 *
 * @method actions findWithoutFail($id, $columns = ['*'])
 * @method actions find($id, $columns = ['*'])
 * @method actions first($columns = ['*'])
*/
class actionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'is_common',
        'is_landed',
        'check_required'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Action::class;
    }
}
