<?php

namespace Tests\Feature;

use App\Actions\Podcast\DeletePodcastAction;
use App\Models\Podcast;
use Database\Seeders\PodcastSeeder;
use Tests\TestCase;

class DeletePodcastTest extends TestCase
{
    /**
     * @var Podcast
     */
    private $podcast;

    /**
     * @var DeletePodcastAction
     */
    private $deletePodcastAction;

    /**
     * Test to see if we can delete a podcast
     *
     * @return void
     */
    public function testDeletePodcast()
    {
        $this->assertTrue($this->deletePodcastAction->handle($this->podcast));
        $this->assertModelMissing($this->podcast);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PodcastSeeder::class);

        $this->deletePodcastAction = app()->make(DeletePodcastAction::class);
        $this->podcast = Podcast::first();


    }
}
