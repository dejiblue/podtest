<?php

namespace Tests\Feature;

use App\Actions\Episode\DeleteEpisodeAction;
use App\Models\Episode;
use Database\Seeders\PodcastSeeder;
use Tests\TestCase;

class DeleteEpisodeTest extends TestCase
{
    /**
     * @var Episode
     */
    private $episode;

    /**
     * @var DeleteEpisodeAction
     */
    private $deleteEpisodeAction;

    /**
     * Test to see if we can delete an episode
     *
     * @return void
     */
    public function testDeleteEpisode()
    {
        $this->assertTrue($this->deleteEpisodeAction->handle($this->episode));
        $this->assertModelMissing($this->episode);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PodcastSeeder::class);

        $this->deleteEpisodeAction = app()->make(DeleteEpisodeAction::class);
        $this->episode = Episode::first();


    }
}
