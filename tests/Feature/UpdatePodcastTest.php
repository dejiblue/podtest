<?php

namespace Tests\Feature;

use App\Actions\Podcast\UpdatePodcastAction;
use Database\Seeders\PodcastSeeder;
use App\Models\Podcast;
use Tests\TestCase;

class UpdatePodcastTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var UpdatePodcastAction
     */
    private $updatePodcastAction;

    /**
     * Test to see if we can update a podcast record with valid input
     *
     * @return void
     */
    public function testUpdateContentUrl()
    {
        $podcast = Podcast::first();
        $title = $podcast->title;

        $podcast = $this->updatePodcastAction->handle($podcast, $this->data);

        $this->assertNotEquals($podcast->title, $title);
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
            'title' => 'Awesome content'
        ];

        $this->updatePodcastAction = app()->make(UpdatePodcastAction::class);

        $this->seed(PodcastSeeder::class);
    }
}
