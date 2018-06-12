<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fiefdom
 * @package App\Models
 * @version May 8, 2018, 2:34 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
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
	 * Accessors & Mutators
	 */
	public function getCapitalAttribute()
	{
		return $this->fiefs
			->sortByDesc(function($fief) { 
				return $fief->territory->castle_strength;
			})
			->sortBy('created_at')
			->first();
	}
    
	public function getZoomAttribute()
	{
		
		//set borders
		$xMin = 3500;
		$xMax = 0;
		$yMin = 7500;
		$yMax = 0;
		
		//determine x and y ranges
		foreach($this->fiefs as $fief){
			$xMin = $fief->territory->row < $xMin ? $fief->territory->row : $xMin;
			$xMax = $fief->territory->row > $xMax ? $fief->territory->row : $xMax;
			$yMin = $fief->territory->column < $yMin ? $fief->territory->column : $yMin;
			$yMax = $fief->territory->column > $yMax ? $fief->territory->column : $yMax;
}

		//work out the distance
		$xDiff = $xMax - $xMin;
		$yDiff = $yMax - $yMin;
		
		//return the greater of them
		return ($xDiff > $yDiff ? $xDiff : $yDiff) + 1;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphTo
	 **/
	public function ruler()
	{
		return $this->morphTo();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\morphMany
	 **/
	public function fiefs()
	{
		return $this->morphMany('\App\Models\Fief', 'fiefdom');
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
