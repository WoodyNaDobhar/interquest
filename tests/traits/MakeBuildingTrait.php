<?php

use Faker\Factory as Faker;
use App\Models\Building;
use App\Repositories\BuildingRepository;

trait MakeBuildingTrait
{
    /**
     * Create fake instance of Building and save it in database
     *
     * @param array $buildingFields
     * @return Building
     */
    public function makeBuilding($buildingFields = [])
    {
        /** @var BuildingRepository $buildingRepo */
        $buildingRepo = App::make(BuildingRepository::class);
        $theme = $this->fakeBuildingData($buildingFields);
        return $buildingRepo->create($theme);
    }

    /**
     * Get fake instance of Building
     *
     * @param array $buildingFields
     * @return Building
     */
    public function fakeBuilding($buildingFields = [])
    {
        return new Building($this->fakeBuildingData($buildingFields));
    }

    /**
     * Get fake data of Building
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBuildingData($buildingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'cost_gold' => $fake->randomDigitNotNull,
            'cost_iron' => $fake->randomDigitNotNull,
            'cost_timber' => $fake->randomDigitNotNull,
            'cost_stone' => $fake->randomDigitNotNull,
            'cost_grain' => $fake->randomDigitNotNull,
            'cost_actions' => $fake->randomDigitNotNull,
            'expandable' => $fake->randomDigitNotNull,
            'builds_maximum' => $fake->randomDigitNotNull,
            'resource_required' => $fake->word,
            'building_required' => $fake->word,
            'waterway_required' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $buildingFields);
    }
}
