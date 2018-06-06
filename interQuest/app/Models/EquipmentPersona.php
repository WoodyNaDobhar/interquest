<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentPersona
 * @package App\Models
 * @version June 5, 2018, 8:53 pm MDT
 *
 * @property \App\Models\Equipment equipment
 * @property \App\Models\Persona persona
 * @property \App\Models\Territory territory
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection equipments
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer equipment_id
 * @property integer persona_id
 * @property integer territory_id
 */
class EquipmentPersona extends Model
{
    use SoftDeletes;

    public $table = 'equipments_personas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'equipment_id',
        'persona_id',
        'territory_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'equipment_id' => 'integer',
        'persona_id' => 'integer',
        'territory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
	 * Accessors & Mutators
	 */
	public function getNameAttribute($value)
	{
		if(!$value){
			return $this->equipment->name;
		}else{
			return $value;
		}
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipment()
    {
        return $this->belongsTo(\App\Models\Equipment::class);
    }

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
    public function territory()
    {
        return $this->belongsTo(\App\Models\Territory::class);
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
