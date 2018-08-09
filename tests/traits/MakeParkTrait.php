<?php

use Faker\Factory as Faker;
use App\Models\Park;
use App\Repositories\ParkRepository;

trait MakeParkTrait
{
    /**
     * Create fake instance of Park and save it in database
     *
     * @param array $parkFields
     * @return Park
     */
    public function makePark($parkFields = [])
    {
        /** @var ParkRepository $parkRepo */
        $parkRepo = App::make(ParkRepository::class);
        $theme = $this->fakeParkData($parkFields);
        return $parkRepo->create($theme);
    }

    /**
     * Get fake instance of Park
     *
     * @param array $parkFields
     * @return Park
     */
    public function fakePark($parkFields = [])
    {
        return new Park($this->fakeParkData($parkFields));
    }

    /**
     * Get fake data of Park
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParkData($parkFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'orkID' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'rank' => $fake->word,
            'territory_id' => $fake->randomDigitNotNull,
            'midreign' => $fake->word,
            'coronation' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $parkFields);
    }
}
