<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ActionPersona
 * @package App\Models
 * @version June 4, 2018, 4:35 pm MDT
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Action action
 * @property \App\Models\Territory territory
 * @property \App\Models\Territory territory
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property integer action_id
 * @property integer persona_id
 * @property integer source_territory_id
 * @property integer target_territory_id
 * @property integer result
 */
class ActionPersona extends Model
{
    use SoftDeletes;

    public $table = 'actions_personas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'action_id',
        'persona_id',
        'source_territory_id',
        'target_territory_id',
        'result'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'action_id' => 'integer',
        'persona_id' => 'integer',
        'source_territory_id' => 'integer',
        'target_territory_id' => 'integer',
        'result' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function action()
    {
        return $this->belongsTo(\App\Models\Action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function source()
    {
        return $this->belongsTo(\App\Models\Territory::class, 'source_territory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function target()
    {
        return $this->belongsTo(\App\Models\Territory::class, 'target_territory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function comments()
    {
    	return $this->morphMany('\App\Models\Comment', 'commented');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function revisions()
    {
    	return $this->morphMany('\App\Models\Revision', 'changed');
    }
}
