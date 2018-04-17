<?php

namespace App\Repositories;

use App\Models\Social;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SocialRepository
 * @package App\Repositories
 * @version April 14, 2018, 1:50 am MDT
 *
 * @method Social findWithoutFail($id, $columns = ['*'])
 * @method Social find($id, $columns = ['*'])
 * @method Social first($columns = ['*'])
*/
class SocialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'provider_user_id',
        'provider'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Social::class;
    }
}
