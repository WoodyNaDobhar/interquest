<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

/**
 * Class Fiefdom
 * @package App\Models
 * @version May 8, 2018, 2:34 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property string name
 * @property string image
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
		'image',
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
		'image' => 'string',
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
	 * Append Accessors
	 *
	 * @var array
	 */
	protected $appends = [
		'likeness'
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
	
	public function getPopulationAttribute()
	{
		
		//setup
		$count = 0;
		
		//iterate territories
		foreach($this->fiefs as $fief){
			$count = $count + $fief->territory->residentPersonas->count() + $fief->territory->residentNpcs->count();
		}
		
		return $count;
	}
	
	public function setImageAttribute($value)
	{
		$this->attributes['image'] = $value == '' ? NULL : $value;
	}
	
	public function getLikenessAttribute()
	{
		$value = $this->image && $this->image != '' ? $this->image : null;
		if($value){
			if($value == 'file'){
				if(Storage::disk('public')->exists('/fiefdoms/' . $this->id . '.jpg')){
					return '/storage/fiefdoms/' . $this->id . '.jpg';
				}
				if(Storage::disk('public')->exists('/fiefdoms/' . $this->id . '.jpeg')){
					return '/storage/fiefdoms/' . $this->id . '.jpeg';
				}
				if(Storage::disk('public')->exists('/fiefdoms/' . $this->id . '.gif')){
					return '/storage/fiefdoms/' . $this->id . '.gif';
				}
				if(Storage::disk('public')->exists('/fiefdoms/' . $this->id . '.png')){
					return '/storage/fiefdoms/' . $this->id . '.png';
				}
				if(Storage::disk('public')->exists('/fiefdoms/' . $this->id . '.bmp')){
					return '/storage/fiefdoms/' . $this->id . '.bmp';
				}
			}
			return '/img/fiefdom.png';
		}
		return '/img/fiefdom.png';
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
