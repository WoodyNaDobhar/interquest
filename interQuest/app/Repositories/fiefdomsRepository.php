<?php

namespace App\Repositories;

use App\Models\fiefdoms;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class fiefdomsRepository
 * @package App\Repositories
 * @version April 10, 2018, 2:42 pm MDT
 *
 * @method fiefdoms findWithoutFail($id, $columns = ['*'])
 * @method fiefdoms find($id, $columns = ['*'])
 * @method fiefdoms first($columns = ['*'])
*/
class fiefdomsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ruler_id',
        'ruler_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return fiefdoms::class;
    }
}
