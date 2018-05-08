<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Social
 * @package App\Models
 * @version April 14, 2018, 1:50 am MDT
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection fiefs
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property \Illuminate\Database\Eloquent\Collection territories
 * @property integer user_id
 * @property string provider_user_id
 * @property string provider
 */
class Social extends Model
{
    use SoftDeletes;

    public $table = 'social_accounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'provider_user_id',
        'provider'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'provider_user_id' => 'string',
        'provider' => 'string'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
