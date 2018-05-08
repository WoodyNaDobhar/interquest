<?php

namespace App\Repositories;

use App\Models\Revision;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RevisionRepository
 * @package App\Repositories
 * @version May 8, 2018, 3:30 pm MDT
 *
 * @method Revision findWithoutFail($id, $columns = ['*'])
 * @method Revision find($id, $columns = ['*'])
 * @method Revision first($columns = ['*'])
*/
class RevisionRepository extends BaseRepository
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
