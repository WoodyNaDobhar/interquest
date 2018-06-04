<?php

namespace App\Repositories;

use App\Models\ActionPersona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActionPersonaRepository
 * @package App\Repositories
 * @version June 4, 2018, 4:35 pm MDT
 *
 * @method ActionPersona findWithoutFail($id, $columns = ['*'])
 * @method ActionPersona find($id, $columns = ['*'])
 * @method ActionPersona first($columns = ['*'])
*/
class ActionPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'action_id',
        'persona_id',
        'source_territory_id',
        'target_territory_id',
        'result'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActionPersona::class;
    }
}
