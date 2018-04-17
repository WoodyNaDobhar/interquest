<?php

namespace App\Repositories;

use App\Models\Territory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class territoriesRepository
 * @package App\Repositories
 * @version April 10, 2018, 5:32 pm MDT
 *
 * @method territories findWithoutFail($id, $columns = ['*'])
 * @method territories find($id, $columns = ['*'])
 * @method territories first($columns = ['*'])
*/
class territoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'row',
        'column',
        'terrain_id',
        'primary_resource',
        'secondary_resource',
        'castle_strength',
        'is_wasteland',
        'is_no_mans_land',
        'has_road'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Territory::class;
    }
}
