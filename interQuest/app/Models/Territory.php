<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Territory
 * @package App\Models
 * @version May 8, 2018, 2:38 pm MDT
 *
 * @property \App\Models\Terrain terrain
 * @property \Illuminate\Database\Eloquent\Collection ActionPersona
 * @property \Illuminate\Database\Eloquent\Collection BuildingTerritory
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsNpc
 * @property \Illuminate\Database\Eloquent\Collection EquipmentPersona
 * @property \Illuminate\Database\Eloquent\Collection Fiefe
 * @property \Illuminate\Database\Eloquent\Collection Npc
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer row
 * @property integer column
 * @property integer terrain_id
 * @property string primary_resource
 * @property string secondary_resource
 * @property integer castle_strength
 * @property integer gold
 * @property integer iron
 * @property integer timber
 * @property integer stone
 * @property integer grain
 * @property boolean is_wasteland
 * @property boolean is_no_mans_land
 */
class Territory extends Model
{
	use SoftDeletes;

	public $table = 'territories';
	
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';


	protected $dates = ['deleted_at'];


	public $fillable = [
		'name',
		'row',
		'column',
		'terrain_id',
		'primary_resource',
		'secondary_resource',
		'castle_strength',
		'gold',
		'iron',
		'timber',
		'stone',
		'grain',
		'is_wasteland',
		'is_no_mans_land'
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'name' => 'string',
		'row' => 'integer',
		'column' => 'integer',
		'terrain_id' => 'integer',
		'primary_resource' => 'string',
		'secondary_resource' => 'string',
		'castle_strength' => 'integer',
		'gold' => 'integer',
		'iron' => 'integer',
		'timber' => 'integer',
		'stone' => 'integer',
		'grain' => 'integer',
		'is_wasteland' => 'boolean',
		'is_no_mans_land' => 'boolean'
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		
	];

	/**
	 * Accessor Appending
	 *
	 * @var array
	 */
	protected $appends = ['displayname'];

	/**
	 * Accessors & Mutators
	 */
	public function getDisplaynameAttribute($value)
	{
		return
		
				($this->fief && $this->fief->name != '' ? $this->fief->name : ($value != '' ? $value : $this->id . ' - '))
			. 
				($value != '' || ($this->fief && $this->fief->name != '') ? ' - ' : '')
			.
				($this->fief && $this->fief->fiefdom && $this->fief->fiefdom->name != '' ? $this->fief->fiefdom->name : '')
			.
				(Park::where('territory_id', $this->id)->exists() ? ' (Capital)' : '')
			;
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
	public function personaActions()
	{
		return $this->hasMany(\App\Models\ActionPersona::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function buildings()
	{
		return $this->hasMany(\App\Models\BuildingTerritory::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function NpcEquipment()
	{
		return $this->hasMany(\App\Models\EquipmentsNpc::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function personaEquipment()
	{
		return $this->hasMany(\App\Models\EquipmentPersona::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 **/
	public function fief()
	{
		return $this->hasOne(\App\Models\Fief::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function residentNpcs()
	{
		return $this->hasMany(\App\Models\Npc::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function residentPersonas()
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
