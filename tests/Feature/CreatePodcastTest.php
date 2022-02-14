<?php

namespace Tests\Feature;

use App\Actions\Podcast\CreatePodcastAction;
use App\Models\Podcast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePodcastTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var CreatePodcastAction
     */
    private $createPodcastAction;

    /**
     * Test to see if we can create a podcast with valid input
     *
     * @return void
     */
    public function testCreatePodcast()
    {
        $podcast = $this->createPodcastAction->handle($this->data);

        $this->assertModelExists($podcast);
        $this->assertInstanceOf(Podcast::class, $podcast);
        $this->assertEquals($this->data['title'], $podcast->title);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'title' => 'test title',
            'description' => 'test description',
            'website_url' => 'https://test.website.test',
            'rss_feed_url' => 'https://test.rssfeeed.test',
            'language' => 'test language',
            'artwork_url' => 'https://test.test.test',
        ];

        $this->createPodcastAction = app()->make(CreatePodcastAction::class);
    }
}
