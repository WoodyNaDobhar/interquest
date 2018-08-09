<?php

use Faker\Factory as Faker;
use App\Models\Fief;
use App\Repositories\FiefRepository;

trait MakeFiefTrait
{
    /**
     * Create fake instance of Fief and save it in database
     *
     * @param array $fiefFields
     * @return Fief
     */
    public function makeFief($fiefFields = [])
    {
        /** @var FiefRepository $fiefRepo */
        $fiefRepo = App::make(FiefRepository::class);
        $theme = $this->fakeFiefData($fiefFields);
        return $fiefRepo->create($theme);
    }

    /**
     * Get fake instance of Fief
     *
     * @param array $fiefFields
     * @return Fief
     */
    public function fakeFief($fiefFields = [])
    {
        return new Fief($this->fakeFiefData($fiefFields));
    }

    /**
     * Get fake data of Fief
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFiefData($fiefFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'territory_id' => $fake->randomDigitNotNull,
            'fiefdom_id' => $fake->randomDigitNotNull,
            'fiefdom_type' => $fake->word,
            'ruler_id' => $fake->randomDigitNotNull,
            'ruler_type' => $fake->word,
            'steward_id' => $fake->randomDigitNotNull,
            'steward_type' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $fiefFields);
    }
}
