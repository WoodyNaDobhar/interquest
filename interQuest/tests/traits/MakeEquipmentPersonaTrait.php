<?php

use Faker\Factory as Faker;
use App\Models\EquipmentPersona;
use App\Repositories\EquipmentPersonaRepository;

trait MakeEquipmentPersonaTrait
{
    /**
     * Create fake instance of EquipmentPersona and save it in database
     *
     * @param array $equipmentPersonaFields
     * @return EquipmentPersona
     */
    public function makeEquipmentPersona($equipmentPersonaFields = [])
    {
        /** @var EquipmentPersonaRepository $equipmentPersonaRepo */
        $equipmentPersonaRepo = App::make(EquipmentPersonaRepository::class);
        $theme = $this->fakeEquipmentPersonaData($equipmentPersonaFields);
        return $equipmentPersonaRepo->create($theme);
    }

    /**
     * Get fake instance of EquipmentPersona
     *
     * @param array $equipmentPersonaFields
     * @return EquipmentPersona
     */
    public function fakeEquipmentPersona($equipmentPersonaFields = [])
    {
        return new EquipmentPersona($this->fakeEquipmentPersonaData($equipmentPersonaFields));
    }

    /**
     * Get fake data of EquipmentPersona
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEquipmentPersonaData($equipmentPersonaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'equipment_id' => $fake->randomDigitNotNull,
            'persona_id' => $fake->randomDigitNotNull,
            'territory_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $equipmentPersonaFields);
    }
}
