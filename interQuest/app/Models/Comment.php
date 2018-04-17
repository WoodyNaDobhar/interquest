<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comments
 * @package App\Models
 * @version April 10, 2018, 2:31 pm MDT
 *
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection actionsPersonas
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property integer commented_id
 * @property string commented_type
 * @property integer author_persona_id
 * @property string subject
 * @property string message
 * @property boolean show_mapkeepers
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'commented_id',
        'commented_type',
        'author_persona_id',
        'subject',
        'message',
        'show_mapkeepers'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'commented_id' => 'integer',
        'commented_type' => 'string',
        'author_persona_id' => 'integer',
        'subject' => 'string',
        'message' => 'string',
        'show_mapkeepers' => 'boolean'
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
    public function commented()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function author()
    {
        return $this->belongsTo(\App\Models\Persona::class);
    }
}
