<?php

use Faker\Factory as Faker;
use App\Models\Terrain;
use App\Repositories\TerrainRepository;

trait MakeTerrainTrait
{
    /**
     * Create fake instance of Terrain and save it in database
     *
     * @param array $terrainFields
     * @return Terrain
     */
    public function makeTerrain($terrainFields = [])
    {
        /** @var TerrainRepository $terrainRepo */
        $terrainRepo = App::make(TerrainRepository::class);
        $theme = $this->fakeTerrainData($terrainFields);
        return $terrainRepo->create($theme);
    }

    /**
     * Get fake instance of Terrain
     *
     * @param array $terrainFields
     * @return Terrain
     */
    public function fakeTerrain($terrainFields = [])
    {
        return new Terrain($this->fakeTerrainData($terrainFields));
    }

    /**
     * Get fake data of Terrain
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTerrainData($terrainFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $terrainFields);
    }
}
