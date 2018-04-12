<?php

namespace App\Repositories;

use App\Models\comments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class commentsRepository
 * @package App\Repositories
 * @version April 10, 2018, 2:31 pm MDT
 *
 * @method comments findWithoutFail($id, $columns = ['*'])
 * @method comments find($id, $columns = ['*'])
 * @method comments first($columns = ['*'])
*/
class commentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'commented_id',
        'commented_type',
        'author_persona_id',
        'subject',
        'message',
        'show_mapkeepers'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return comments::class;
    }
}
