<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class fiefdoms
 * @package App\Models
 * @version April 10, 2018, 2:42 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection Fiefe
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer ruler_id
 * @property string ruler_type
 */
class Fiefdom extends Model
{
    use SoftDeletes;

    public $table = 'fiefdoms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    
    public $fillable = [
        'name',
        'ruler_id',
        'ruler_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'ruler_id' => 'integer',
        'ruler_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphTo
     **/
    public function ruler()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fiefs()
    {
        return $this->hasMany(\App\Models\Fief::class);
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
