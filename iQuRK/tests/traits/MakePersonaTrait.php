<?php

use Faker\Factory as Faker;
use App\Models\Persona;
use App\Repositories\PersonaRepository;

trait MakePersonaTrait
{
    /**
     * Create fake instance of Persona and save it in database
     *
     * @param array $personaFields
     * @return Persona
     */
    public function makePersona($personaFields = [])
    {
        /** @var PersonaRepository $personaRepo */
        $personaRepo = App::make(PersonaRepository::class);
        $theme = $this->fakePersonaData($personaFields);
        return $personaRepo->create($theme);
    }

    /**
     * Get fake instance of Persona
     *
     * @param array $personaFields
     * @return Persona
     */
    public function fakePersona($personaFields = [])
    {
        return new Persona($this->fakePersonaData($personaFields));
    }

    /**
     * Get fake data of Persona
     *
     * @param array $postFields
     * @return array
     */
    public function fakePersonaData($personaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'orkID' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'long_name' => $fake->word,
            'image' => $fake->word,
            'vocation_id' => $fake->randomDigitNotNull,
            'metatype_id' => $fake->randomDigitNotNull,
            'background_public' => $fake->text,
            'background_private' => $fake->text,
            'park_id' => $fake->randomDigitNotNull,
            'territory_id' => $fake->randomDigitNotNull,
            'gold' => $fake->randomDigitNotNull,
            'iron' => $fake->randomDigitNotNull,
            'timber' => $fake->randomDigitNotNull,
            'stone' => $fake->randomDigitNotNull,
            'grain' => $fake->randomDigitNotNull,
            'action_id' => $fake->randomDigitNotNull,
            'is_knight' => $fake->word,
            'is_rebel' => $fake->word,
            'is_monarch' => $fake->word,
            'fiefs_assigned' => $fake->randomDigitNotNull,
            'shattered' => $fake->word,
            'deceased' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $personaFields);
    }
}
