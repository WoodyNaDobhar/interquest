<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version May 8, 2018, 3:31 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property \Illuminate\Database\Eloquent\Collection SocialAccount
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property boolean is_mapkeeper
 * @property boolean is_admin
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'is_mapkeeper',
        'is_admin'
    ];

    protected $hidden = ['password', 'rememeber_token', 'is_mapkeeper', 'is_admin'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'is_mapkeeper' => 'boolean',
        'is_admin' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function persona()
    {
        return $this->hasOne(\App\Models\Persona::class, 'user_id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function social()
    {
        return $this->hasOne(\App\Models\Social::class);
    }
}
