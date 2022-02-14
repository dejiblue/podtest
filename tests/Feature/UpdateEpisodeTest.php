<?php

namespace Tests\Feature;

use App\Actions\Episode\UpdateEpisodeAction;
use Database\Seeders\PodcastSeeder;
use App\Models\Episode;
use Tests\TestCase;

class UpdateEpisodeTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var UpdateEpisodeAction
     */
    private $updateEpisodeAction;

    /**
     * Test to see if we can update a podcast episode with valid input
     *
     * @return void
     */
    public function testUpdateEpisode()
    {
        $episode = Episode::first();
        $title = $episode->title;

        $episode = $this->updateEpisodeAction->handle($episode, $this->data);

        $this->assertNotEquals($episode->title, $title);
        $this->assertEquals($this->data['title'], $episode->title);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'title' => 'Great episode'
        ];

        $this->updateEpisodeAction = app()->make(UpdateEpisodeAction::class);

        $this->seed(PodcastSeeder::class);
    }
}
