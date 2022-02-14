<?php

namespace Tests\Feature;

use App\Actions\Episode\CreateEpisodeAction;
use App\Models\Episode;
use App\Models\Podcast;
use Database\Seeders\PodcastSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateEpisodeTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var CreateEpisodeAction
     */
    private $createEpisodeAction;

    /**
     * Test to see if we can create a Episode with valid input
     *
     * @return void
     */
    public function testCreatePodcast()
    {
        $podcast = Podcast::first();
        $this->data['podcast_id'] = $podcast->id;
        $episode = $this->createEpisodeAction->handle($this->data);

        $this->assertModelExists($episode);
        $this->assertInstanceOf(Episode::class, $episode);
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
            'title' => 'The new episode',
            'description' => 'Sample new description',
            'episode_url' => 'https://www.one.com/d43',
            'audio_url' => 'https://www.two.com/d/playlist/2b46',
        ];

        $this->createEpisodeAction = app()->make(CreateEpisodeAction::class);

        $this->seed(PodcastSeeder::class);
    }
}
