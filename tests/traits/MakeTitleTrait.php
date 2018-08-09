<?php

use Faker\Factory as Faker;
use App\Models\Title;
use App\Repositories\TitleRepository;

trait MakeTitleTrait
{
    /**
     * Create fake instance of Title and save it in database
     *
     * @param array $titleFields
     * @return Title
     */
    public function makeTitle($titleFields = [])
    {
        /** @var TitleRepository $titleRepo */
        $titleRepo = App::make(TitleRepository::class);
        $theme = $this->fakeTitleData($titleFields);
        return $titleRepo->create($theme);
    }

    /**
     * Get fake instance of Title
     *
     * @param array $titleFields
     * @return Title
     */
    public function fakeTitle($titleFields = [])
    {
        return new Title($this->fakeTitleData($titleFields));
    }

    /**
     * Get fake data of Title
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTitleData($titleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'is_landed' => $fake->word,
            'hierarchy' => $fake->randomDigitNotNull,
            'fiefs_maximum' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $titleFields);
    }
}
