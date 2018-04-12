<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class equipments
 * @package App\Models
 * @version April 9, 2018, 9:43 pm MDT
 *
 * @property \App\Models\Building building
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsNpc
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsPersona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer price
 * @property integer units
 * @property string description
 * @property decimal weight
 * @property integer cargo
 * @property decimal craft_gold
 * @property decimal craft_iron
 * @property decimal craft_timber
 * @property decimal craft_stone
 * @property decimal craft_grain
 * @property integer craft_actions
 * @property integer building_id
 * @property boolean is_artifact
 * @property boolean is_relic
 */
class equipments extends Model
{
    use SoftDeletes;

    public $table = 'equipments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'price',
        'units',
        'description',
        'weight',
        'cargo',
        'craft_gold',
        'craft_iron',
        'craft_timber',
        'craft_stone',
        'craft_grain',
        'craft_actions',
        'building_id',
        'is_artifact',
        'is_relic'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'units' => 'integer',
        'description' => 'string',
        'cargo' => 'integer',
        'craft_actions' => 'integer',
        'building_id' => 'integer',
        'is_artifact' => 'boolean',
        'is_relic' => 'boolean'
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
    public function requiredBuilding()
    {
        return $this->belongsTo(\App\Models\Building::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function ownedByNpcs()
    {
        return $this->belongsToMany(\App\Models\EquipmentsNpc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function ownedByPersonas()
    {
        return $this->belongsToMany(\App\Models\EquipmentsPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function revisions()
    {
    	return $this->morphMany(\App\Models\Comment::class, 'changed');
    }
}
