<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class actions
 * @package App\Models
 * @version April 9, 2018, 9:40 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection ActionsPersona
 * @property \Illuminate\Database\Eloquent\Collection Npc
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property string description
 * @property boolean is_common
 * @property boolean is_landed
 * @property boolean check_required
 */
class Action extends Model
{
    use SoftDeletes;

    public $table = 'actions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'name',
        'description',
        'is_common',
        'is_landed',
        'check_required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'is_common' => 'boolean',
        'is_landed' => 'boolean',
        'check_required' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function actionsByPersonas()
    {
        return $this->belongsToMany(\App\Models\ActionsPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function npcsWithDefault()
    {
        return $this->hasMany(\App\Models\Npc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personasWithDefault()
    {
        return $this->hasMany(\App\Models\Persona::class);
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
