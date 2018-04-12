<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class npcs
 * @package App\Models
 * @version April 9, 2018, 9:47 pm MDT
 *
 * @property \App\Models\Action action
 * @property \App\Models\Territory territory
 * @property \App\Models\Race race
 * @property \App\Models\Vocation vocation
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection Comment
 * @property \Illuminate\Database\Eloquent\Collection EquipmentsNpc
 * @property \Illuminate\Database\Eloquent\Collection Fiefdom
 * @property \Illuminate\Database\Eloquent\Collection Fiefe
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property string private_name
 * @property string image
 * @property integer vocation_id
 * @property integer race_id
 * @property string background_public
 * @property string background_private
 * @property integer territory_id
 * @property integer gold
 * @property integer iron
 * @property integer timber
 * @property integer stone
 * @property integer grain
 * @property integer action_id
 * @property string|\Carbon\Carbon deceased
 */
class npcs extends Model
{
    use SoftDeletes;

    public $table = 'npcs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'private_name',
        'image',
        'vocation_id',
        'race_id',
        'background_public',
        'background_private',
        'territory_id',
        'gold',
        'iron',
        'timber',
        'stone',
        'grain',
        'action_id',
        'deceased'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'private_name' => 'string',
        'image' => 'string',
        'vocation_id' => 'integer',
        'race_id' => 'integer',
        'background_public' => 'string',
        'background_private' => 'string',
        'territory_id' => 'integer',
        'gold' => 'integer',
        'iron' => 'integer',
        'timber' => 'integer',
        'stone' => 'integer',
        'grain' => 'integer',
        'action_id' => 'integer'
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
    public function actionDefault()
    {
        return $this->belongsTo(\App\Models\Action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function territoryHome()
    {
        return $this->belongsTo(\App\Models\Territory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function race()
    {
        return $this->belongsTo(\App\Models\Race::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vocation()
    {
        return $this->belongsTo(\App\Models\Vocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipments()
    {
        return $this->hasMany(\App\Models\EquipmentsNpc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function fiefdoms()
    {
    	return $this->morphMany(\App\Models\Fiefdom::class, 'ruler');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function fievesRuling()
    {
        return $this->morphMany(\App\Models\Fief::class, 'ruler');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function fievesStewarding()
    {
        return $this->morphMany(\App\Models\Fief::class, 'steward');
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
