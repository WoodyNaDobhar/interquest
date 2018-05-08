<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipment
 * @package App\Models
 * @version May 8, 2018, 2:34 pm MDT
 *
 * @property \App\Models\Building building
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
 * @property string magic_type
 */
class Equipment extends Model
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
        'magic_type'
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
        'magic_type' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ownedByNpcs()
    {
        return $this->hasMany(\App\Models\EquipmentsNpc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ownedByPersonae()
    {
        return $this->hasMany(\App\Models\EquipmentsPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function revisions()
    {
    	return $this->morphMany('\App\Models\Revision', 'changed');
	}
}