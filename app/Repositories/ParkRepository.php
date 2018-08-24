<?php

namespace App\Repositories;

use App\Models\Park;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParkRepository
 * @package App\Repositories
 * @version May 8, 2018, 2:36 pm MDT
 *
 * @method Park findWithoutFail($id, $columns = ['*'])
 * @method Park find($id, $columns = ['*'])
 * @method Park first($columns = ['*'])
*/
class ParkRepository extends BaseRepository
{
	/**
	 * @var array
	 */
	protected $fieldSearchable = [
		'orkID',
		'name',
		'rank',
		'territory_id',
		'midreign',
		'coronation',
		'ruler_id',
		'ruler_type'
	];

	/**
	 * Configure the Model
	 **/
	public function model()
	{
		return Park::class;
	}
}
