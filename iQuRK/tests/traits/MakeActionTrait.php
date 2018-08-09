<?php

use Faker\Factory as Faker;
use App\Models\Action;
use App\Repositories\ActionRepository;

trait MakeActionTrait
{
    /**
     * Create fake instance of Action and save it in database
     *
     * @param array $actionFields
     * @return Action
     */
    public function makeAction($actionFields = [])
    {
        /** @var ActionRepository $actionRepo */
        $actionRepo = App::make(ActionRepository::class);
        $theme = $this->fakeActionData($actionFields);
        return $actionRepo->create($theme);
    }

    /**
     * Get fake instance of Action
     *
     * @param array $actionFields
     * @return Action
     */
    public function fakeAction($actionFields = [])
    {
        return new Action($this->fakeActionData($actionFields));
    }

    /**
     * Get fake data of Action
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActionData($actionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'is_common' => $fake->word,
            'is_landed' => $fake->word,
            'check_required' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $actionFields);
    }
}
