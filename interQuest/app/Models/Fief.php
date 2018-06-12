<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fief
 * @package App\Models
 * @version May 8, 2018, 2:35 pm MDT
 *
 * @property \App\Models\Territory territory
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer territory_id
 * @property integer fiefdom_id
 * @property string fiefdom_type
 * @property integer ruler_id
 * @property string ruler_type
 * @property integer steward_id
 * @property string steward_type
 */
class Fief extends Model
{
    use SoftDeletes;

    public $table = 'fiefs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'territory_id',
        'fiefdom_id',
        'fiefdom_type',
        'ruler_id',
        'ruler_type',
        'steward_id',
        'steward_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'territory_id' => 'integer',
        'fiefdom_id' => 'integer',
        'fiefdom_type' => 'string',
        'ruler_id' => 'integer',
        'ruler_type' => 'string',
        'steward_id' => 'integer',
        'steward_type' => 'string'
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
    public function territory()
    {
        return $this->belongsTo(\App\Models\Territory::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphTo
	 **/
	public function fiefdom()
	{
		return $this->morphTo();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphTo
	 **/
	public function steward()
	{
		return $this->morphTo();
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
