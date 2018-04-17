<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class revisions
 * @package App\Models
 * @version April 10, 2018, 7:00 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection fieves
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property \Illuminate\Database\Eloquent\Collection territories
 * @property integer changed_id
 * @property string changed_type
 */
class Revision extends Model
{
    use SoftDeletes;

    public $table = 'revisions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'changed_id',
        'changed_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'changed_id' => 'integer',
        'changed_type' => 'string'
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
    public function changed()
    {
        return $this->morphTo();
    }
}
