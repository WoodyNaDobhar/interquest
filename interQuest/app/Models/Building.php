<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class buildings
 * @package App\Models
 * @version April 9, 2018, 9:41 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection BuildingsTerritory
 * @property \Illuminate\Database\Eloquent\Collection Equipment
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property string description
 * @property integer cost_gold
 * @property integer cost_iron
 * @property integer cost_timber
 * @property integer cost_stone
 * @property integer cost_grain
 * @property integer cost_actions
 * @property integer expandable
 * @property integer builds_maximum
 * @property string resource_required
 * @property string building_required
 * @property boolean waterway_required
 */
class Building extends Model
{
    use SoftDeletes;

    public $table = 'buildings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
        'cost_gold',
        'cost_iron',
        'cost_timber',
        'cost_stone',
        'cost_grain',
        'cost_actions',
        'expandable',
        'builds_maximum',
        'resource_required',
        'building_required',
        'waterway_required'
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
        'cost_gold' => 'integer',
        'cost_iron' => 'integer',
        'cost_timber' => 'integer',
        'cost_stone' => 'integer',
        'cost_grain' => 'integer',
        'cost_actions' => 'integer',
        'expandable' => 'integer',
        'builds_maximum' => 'integer',
        'resource_required' => 'string',
        'building_required' => 'string',
        'waterway_required' => 'boolean'
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
    public function buildingsInTerritories()
    {
        return $this->belongsToMany(\App\Models\BuildingsTerritory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipmentsRequiring()
    {
        return $this->hasMany(\App\Models\Equipment::class);
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
