<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class territories
 * @package App\Models
 * @version April 10, 2018, 5:32 pm MDT
 *
 * @property \App\Models\Sector sector
 * @property \App\Models\Terrain terrain
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection BuildingsTerritory
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsNpc
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsPersona
 * @property \Illuminate\Database\Eloquent\Collection Fiefe
 * @property \Illuminate\Database\Eloquent\Collection Npc
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property integer name
 * @property integer sector_id
 * @property integer row
 * @property integer column
 * @property integer terrain_id
 * @property string primary_resource
 * @property string secondary_resource
 * @property integer castle_strength
 * @property boolean is_wasteland
 * @property boolean is_no_mans_land
 * @property boolean has_road
 */
class territories extends Model
{
    use SoftDeletes;

    public $table = 'territories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'sector_id',
        'row',
        'column',
        'terrain_id',
        'primary_resource',
        'secondary_resource',
        'castle_strength',
        'is_wasteland',
        'is_no_mans_land',
        'has_road'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'integer',
        'sector_id' => 'integer',
        'row' => 'integer',
        'column' => 'integer',
        'terrain_id' => 'integer',
        'primary_resource' => 'string',
        'secondary_resource' => 'string',
        'castle_strength' => 'integer',
        'is_wasteland' => 'boolean',
        'is_no_mans_land' => 'boolean',
        'has_road' => 'boolean'
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
    public function sector()
    {
        return $this->belongsTo(\App\Models\Sector::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function terrain()
    {
        return $this->belongsTo(\App\Models\Terrain::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function buildings()
    {
        return $this->hasMany(\App\Models\BuildingsTerritory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipmentsOfNpcs()
    {
        return $this->hasMany(\App\Models\EquipmentsNpc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipmentsOfPersonas()
    {
        return $this->hasMany(\App\Models\EquipmentsPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function fief()
    {
        return $this->hasOne(\App\Models\Fiefe::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function npcResidents()
    {
        return $this->hasMany(\App\Models\Npc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personaResidents()
    {
        return $this->hasMany(\App\Models\Persona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function comments()
    {
    	return $this->morphMany(\App\Models\Comment::class, 'commented');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function revisions()
    {
    	return $this->morphMany(\App\Models\Comment::class, 'changed');
    }
}
