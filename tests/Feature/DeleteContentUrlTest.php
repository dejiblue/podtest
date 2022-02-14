<?php

namespace Tests\Feature;

use App\Actions\ContentUrl\DeleteContentUrlAction;
use App\Models\ContentUrl;
use Database\Seeders\ContentUrlSeeder;
use Tests\TestCase;

class DeleteContentUrlTest extends TestCase
{
    /**
     * @var ContentUrl
     */
    private $contentUrl;

    /**
     * @var DeleteContentUrlAction
     */
    private $deleteContentUrlAction;

    /**
     * Test to see if we can delete a content url
     *
     * @return void
     */
    public function testDeleteContentUrl()
    {
        $this->assertTrue($this->deleteContentUrlAction->handle($this->contentUrl));
        $this->assertModelMissing($this->contentUrl);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ContentUrlSeeder::class);

        $this->deleteContentUrlAction = app()->make(DeleteContentUrlAction::class);
        $this->contentUrl = ContentUrl::first();


    }
}
