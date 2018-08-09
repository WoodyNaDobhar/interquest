<?php

namespace App\Repositories;

use App\Models\Title;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TitleRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:38 pm MDT
 *
 * @method Title findWithoutFail($id, $columns = ['*'])
 * @method Title find($id, $columns = ['*'])
 * @method Title first($columns = ['*'])
*/
class TitleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'is_landed',
        'hierarchy',
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
