<?php

use Faker\Factory as Faker;
use App\Models\Vocation;
use App\Repositories\VocationRepository;

trait MakeVocationTrait
{
    /**
     * Create fake instance of Vocation and save it in database
     *
     * @param array $vocationFields
     * @return Vocation
     */
    public function makeVocation($vocationFields = [])
    {
        /** @var VocationRepository $vocationRepo */
        $vocationRepo = App::make(VocationRepository::class);
        $theme = $this->fakeVocationData($vocationFields);
        return $vocationRepo->create($theme);
    }

    /**
     * Get fake instance of Vocation
     *
     * @param array $vocationFields
     * @return Vocation
     */
    public function fakeVocation($vocationFields = [])
    {
        return new Vocation($this->fakeVocationData($vocationFields));
    }

    /**
     * Get fake data of Vocation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVocationData($vocationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'ability' => $fake->word,
            'ability_description' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $vocationFields);
    }
}
