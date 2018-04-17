<?php

namespace App\Repositories;

use App\Models\Revision;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class revisionsRepository
 * @package App\Repositories
 * @version April 10, 2018, 7:00 pm MDT
 *
 * @method revisions findWithoutFail($id, $columns = ['*'])
 * @method revisions find($id, $columns = ['*'])
 * @method revisions first($columns = ['*'])
*/
class revisionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'changed_id',
        'changed_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Revision::class;
    }
}
