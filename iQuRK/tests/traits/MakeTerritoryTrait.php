<?php

use Faker\Factory as Faker;
use App\Models\Territory;
use App\Repositories\TerritoryRepository;

trait MakeTerritoryTrait
{
    /**
     * Create fake instance of Territory and save it in database
     *
     * @param array $territoryFields
     * @return Territory
     */
    public function makeTerritory($territoryFields = [])
    {
        /** @var TerritoryRepository $territoryRepo */
        $territoryRepo = App::make(TerritoryRepository::class);
        $theme = $this->fakeTerritoryData($territoryFields);
        return $territoryRepo->create($theme);
    }

    /**
     * Get fake instance of Territory
     *
     * @param array $territoryFields
     * @return Territory
     */
    public function fakeTerritory($territoryFields = [])
    {
        return new Territory($this->fakeTerritoryData($territoryFields));
    }

    /**
     * Get fake data of Territory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTerritoryData($territoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'row' => $fake->randomDigitNotNull,
            'column' => $fake->randomDigitNotNull,
            'terrain_id' => $fake->randomDigitNotNull,
            'primary_resource' => $fake->word,
            'secondary_resource' => $fake->word,
            'castle_strength' => $fake->randomDigitNotNull,
            'gold' => $fake->randomDigitNotNull,
            'iron' => $fake->randomDigitNotNull,
            'timber' => $fake->randomDigitNotNull,
            'stone' => $fake->randomDigitNotNull,
            'grain' => $fake->randomDigitNotNull,
            'is_wasteland' => $fake->word,
            'is_no_mans_land' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $territoryFields);
    }
}
