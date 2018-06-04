<?php

use Faker\Factory as Faker;
use App\Models\ActionPersona;
use App\Repositories\ActionPersonaRepository;

trait MakeActionPersonaTrait
{
    /**
     * Create fake instance of ActionPersona and save it in database
     *
     * @param array $actionPersonaFields
     * @return ActionPersona
     */
    public function makeActionPersona($actionPersonaFields = [])
    {
        /** @var ActionPersonaRepository $actionPersonaRepo */
        $actionPersonaRepo = App::make(ActionPersonaRepository::class);
        $theme = $this->fakeActionPersonaData($actionPersonaFields);
        return $actionPersonaRepo->create($theme);
    }

    /**
     * Get fake instance of ActionPersona
     *
     * @param array $actionPersonaFields
     * @return ActionPersona
     */
    public function fakeActionPersona($actionPersonaFields = [])
    {
        return new ActionPersona($this->fakeActionPersonaData($actionPersonaFields));
    }

    /**
     * Get fake data of ActionPersona
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActionPersonaData($actionPersonaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'action_id' => $fake->randomDigitNotNull,
            'persona_id' => $fake->randomDigitNotNull,
            'source_territory_id' => $fake->randomDigitNotNull,
            'target_territory_id' => $fake->randomDigitNotNull,
            'result' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $actionPersonaFields);
    }
}
