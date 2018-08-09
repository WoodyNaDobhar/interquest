<?php

namespace App\Repositories;

use App\Models\Action;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActionRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:27 pm MDT
 *
 * @method Action findWithoutFail($id, $columns = ['*'])
 * @method Action find($id, $columns = ['*'])
 * @method Action first($columns = ['*'])
*/
class ActionRepository extends BaseRepository
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
