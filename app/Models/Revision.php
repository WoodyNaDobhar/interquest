<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Revision
 * @package App\Models
 * @version May 8, 2018, 3:30 pm MDT
 *
 * @property \Illuminate\Database\Eloquent\Collection buildingsTerritories
 * @property \Illuminate\Database\Eloquent\Collection personasTitles
 * @property integer changed_id
 * @property string changed_type
 */
class Revision extends Model
{

	public $table = 'revisions';
	
	const CREATED_AT = 'created_at';

	protected $dates = ['created_at'];

	public $fillable = [];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' 						=>'integer',
		'tablename'					=>'string',
		'row'						=>'integer',
		'column'					=>'string',
		'previousIntValue'			=>'integer',
		'newIntValue'				=>'integer',
		'previousTinyintValue'		=>'boolean',
		'newTinyintValue'			=>'boolean',
		'previousFloatValue'		=>'numeric',
		'newFloatValue'				=>'numeric',
		'previousVarcharValue'		=>'string',
		'newVarcharValue'			=>'string',
		'previousTextValue'			=>'string',
		'newTextValue'				=>'string',
		'previousdatetimeValue'		=>'date',
		'newdatetimeValue'			=>'date'
	];

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	public static $rules = array(
		'tablename'					=>'string|max:50',
		'row'						=>'integer',
		'column'					=>'string|max:50',
		'previousIntValue'			=>'integer',
		'newIntValue'				=>'integer',
		'previousTinyintValue'		=>'integer',
		'newTinyintValue'			=>'integer',
		'previousFloatValue'		=>'numeric',
		'newFloatValue'				=>'numeric',
		'previousVarcharValue'		=>'string|max:1000',
		'newVarcharValue'			=>'string|max:1000',
		'previousTextValue'			=>'string',
		'newTextValue'				=>'string',
		'previousdatetimeValue'		=>'date',
		'newdatetimeValue'			=>'date'
	);
}
