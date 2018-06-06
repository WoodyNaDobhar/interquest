<?php

use Faker\Factory as Faker;
use App\Models\BuildingTerritory;
use App\Repositories\BuildingTerritoryRepository;

trait MakeBuildingTerritoryTrait
{
    /**
     * Create fake instance of BuildingTerritory and save it in database
     *
     * @param array $buildingTerritoryFields
     * @return BuildingTerritory
     */
    public function makeBuildingTerritory($buildingTerritoryFields = [])
    {
        /** @var BuildingTerritoryRepository $buildingTerritoryRepo */
        $buildingTerritoryRepo = App::make(BuildingTerritoryRepository::class);
        $theme = $this->fakeBuildingTerritoryData($buildingTerritoryFields);
        return $buildingTerritoryRepo->create($theme);
    }

    /**
     * Get fake instance of BuildingTerritory
     *
     * @param array $buildingTerritoryFields
     * @return BuildingTerritory
     */
    public function fakeBuildingTerritory($buildingTerritoryFields = [])
    {
        return new BuildingTerritory($this->fakeBuildingTerritoryData($buildingTerritoryFields));
    }

    /**
     * Get fake data of BuildingTerritory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBuildingTerritoryData($buildingTerritoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'building_id' => $fake->randomDigitNotNull,
            'territory_id' => $fake->randomDigitNotNull,
            'size' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $buildingTerritoryFields);
    }
}
