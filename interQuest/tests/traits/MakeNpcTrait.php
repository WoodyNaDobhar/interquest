<?php

use Faker\Factory as Faker;
use App\Models\Npc;
use App\Repositories\NpcRepository;

trait MakeNpcTrait
{
    /**
     * Create fake instance of Npc and save it in database
     *
     * @param array $npcFields
     * @return Npc
     */
    public function makeNpc($npcFields = [])
    {
        /** @var NpcRepository $npcRepo */
        $npcRepo = App::make(NpcRepository::class);
        $theme = $this->fakeNpcData($npcFields);
        return $npcRepo->create($theme);
    }

    /**
     * Get fake instance of Npc
     *
     * @param array $npcFields
     * @return Npc
     */
    public function fakeNpc($npcFields = [])
    {
        return new Npc($this->fakeNpcData($npcFields));
    }

    /**
     * Get fake data of Npc
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNpcData($npcFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'private_name' => $fake->word,
            'image' => $fake->word,
            'vocation_id' => $fake->randomDigitNotNull,
            'race_id' => $fake->randomDigitNotNull,
            'background_public' => $fake->text,
            'background_private' => $fake->text,
            'territory_id' => $fake->randomDigitNotNull,
            'gold' => $fake->randomDigitNotNull,
            'iron' => $fake->randomDigitNotNull,
            'timber' => $fake->randomDigitNotNull,
            'stone' => $fake->randomDigitNotNull,
            'grain' => $fake->randomDigitNotNull,
            'action_id' => $fake->randomDigitNotNull,
            'deceased' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $npcFields);
    }
}
