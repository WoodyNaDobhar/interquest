<?php

use Faker\Factory as Faker;
use App\Models\Fiefdom;
use App\Repositories\FiefdomRepository;

trait MakeFiefdomTrait
{
    /**
     * Create fake instance of Fiefdom and save it in database
     *
     * @param array $fiefdomFields
     * @return Fiefdom
     */
    public function makeFiefdom($fiefdomFields = [])
    {
        /** @var FiefdomRepository $fiefdomRepo */
        $fiefdomRepo = App::make(FiefdomRepository::class);
        $theme = $this->fakeFiefdomData($fiefdomFields);
        return $fiefdomRepo->create($theme);
    }

    /**
     * Get fake instance of Fiefdom
     *
     * @param array $fiefdomFields
     * @return Fiefdom
     */
    public function fakeFiefdom($fiefdomFields = [])
    {
        return new Fiefdom($this->fakeFiefdomData($fiefdomFields));
    }

    /**
     * Get fake data of Fiefdom
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFiefdomData($fiefdomFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'ruler_id' => $fake->randomDigitNotNull,
            'ruler_type' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $fiefdomFields);
    }
}
