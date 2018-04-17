<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usersRepository
 * @package App\Repositories
 * @version April 10, 2018, 7:29 pm MDT
 *
 * @method users findWithoutFail($id, $columns = ['*'])
 * @method users find($id, $columns = ['*'])
 * @method users first($columns = ['*'])
*/
class usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'is_mapkeeper',
        'is_admin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
