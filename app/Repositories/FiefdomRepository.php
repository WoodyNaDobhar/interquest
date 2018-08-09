<?php

namespace App\Repositories;

use App\Models\Fiefdom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FiefdomRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:35 pm MDT
 *
 * @method Fiefdom findWithoutFail($id, $columns = ['*'])
 * @method Fiefdom find($id, $columns = ['*'])
 * @method Fiefdom first($columns = ['*'])
*/
class FiefdomRepository extends BaseRepository
{
	/**
	 * @var array
	 */
	protected $fieldSearchable = [
		'name',
		'image',
		'ruler_id',
		'ruler_type'
	];

	/**
	 * Configure the Model
	 **/
	public function model()
	{
		return Fiefdom::class;
	}
}
