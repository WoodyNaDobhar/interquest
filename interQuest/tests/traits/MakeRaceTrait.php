<?php

use Faker\Factory as Faker;
use App\Models\Metatype;
use App\Repositories\MetatypeRepository;

trait MakeMetatypeTrait
{
    /**
     * Create fake instance of Metatype and save it in database
     *
     * @param array $metatypeFields
     * @return Metatype
     */
    public function makeMetatype($metatypeFields = [])
    {
        /** @var MetatypeRepository $metatypeRepo */
        $metatypeRepo = App::make(MetatypeRepository::class);
        $theme = $this->fakeMetatypeData($metatypeFields);
        return $metatypeRepo->create($theme);
    }

    /**
     * Get fake instance of Metatype
     *
     * @param array $metatypeFields
     * @return Metatype
     */
    public function fakeMetatype($metatypeFields = [])
    {
        return new Metatype($this->fakeMetatypeData($metatypeFields));
    }

    /**
     * Get fake data of Metatype
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMetatypeData($metatypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'personable' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $metatypeFields);
    }
}
