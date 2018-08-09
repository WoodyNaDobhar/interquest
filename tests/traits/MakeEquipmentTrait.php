<?php

use Faker\Factory as Faker;
use App\Models\Equipment;
use App\Repositories\EquipmentRepository;

trait MakeEquipmentTrait
{
    /**
     * Create fake instance of Equipment and save it in database
     *
     * @param array $equipmentFields
     * @return Equipment
     */
    public function makeEquipment($equipmentFields = [])
    {
        /** @var EquipmentRepository $equipmentRepo */
        $equipmentRepo = App::make(EquipmentRepository::class);
        $theme = $this->fakeEquipmentData($equipmentFields);
        return $equipmentRepo->create($theme);
    }

    /**
     * Get fake instance of Equipment
     *
     * @param array $equipmentFields
     * @return Equipment
     */
    public function fakeEquipment($equipmentFields = [])
    {
        return new Equipment($this->fakeEquipmentData($equipmentFields));
    }

    /**
     * Get fake data of Equipment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEquipmentData($equipmentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'price' => $fake->randomDigitNotNull,
            'units' => $fake->randomDigitNotNull,
            'description' => $fake->text,
            'weight' => $fake->word,
            'cargo' => $fake->randomDigitNotNull,
            'craft_gold' => $fake->word,
            'craft_iron' => $fake->word,
            'craft_timber' => $fake->word,
            'craft_stone' => $fake->word,
            'craft_grain' => $fake->word,
            'craft_actions' => $fake->randomDigitNotNull,
            'building_id' => $fake->randomDigitNotNull,
            'magic_type' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $equipmentFields);
    }
}
