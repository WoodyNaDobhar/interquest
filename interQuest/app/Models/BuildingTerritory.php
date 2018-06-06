<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BuildingTerritory
 * @package App\Models
 * @version June 4, 2018, 6:54 pm MDT
 *
 * @property \App\Models\Territory territory
 * @property \App\Models\Building building
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property integer building_id
 * @property integer territory_id
 * @property integer size
 */
class BuildingTerritory extends Model
{
    use SoftDeletes;

    public $table = 'buildings_territories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'building_id',
        'territory_id',
        'size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'building_id' => 'integer',
        'territory_id' => 'integer',
        'size' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function building()
    {
        return $this->belongsTo(\App\Models\Building::class);
    }
}
