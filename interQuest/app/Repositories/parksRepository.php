<?php

namespace App\Repositories;

use App\Models\parks;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class parksRepository
 * @package App\Repositories
 * @version April 10, 2018, 6:34 pm MDT
 *
 * @method parks findWithoutFail($id, $columns = ['*'])
 * @method parks find($id, $columns = ['*'])
 * @method parks first($columns = ['*'])
*/
class parksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'orkID',
        'name',
        'rank',
        'sector_id',
        'midreign',
        'coronation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return parks::class;
    }
}
