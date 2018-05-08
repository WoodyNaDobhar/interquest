<?php

use Faker\Factory as Faker;
use App\Models\Race;
use App\Repositories\RaceRepository;

trait MakeRaceTrait
{
    /**
     * Create fake instance of Race and save it in database
     *
     * @param array $raceFields
     * @return Race
     */
    public function makeRace($raceFields = [])
    {
        /** @var RaceRepository $raceRepo */
        $raceRepo = App::make(RaceRepository::class);
        $theme = $this->fakeRaceData($raceFields);
        return $raceRepo->create($theme);
    }

    /**
     * Get fake instance of Race
     *
     * @param array $raceFields
     * @return Race
     */
    public function fakeRace($raceFields = [])
    {
        return new Race($this->fakeRaceData($raceFields));
    }

    /**
     * Get fake data of Race
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRaceData($raceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'personable' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $raceFields);
    }
}
