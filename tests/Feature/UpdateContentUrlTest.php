<?php

namespace Tests\Feature;

use App\Actions\ContentUrl\UpdateContentUrlAction;
use App\Models\ContentUrl;
use Database\Seeders\ContentUrlSeeder;
use Tests\TestCase;

class UpdateContentUrlTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var UpdateContentUrlAction
     */
    private $updateContentUrlAction;

    /**
     * Test to see if we can update a content url with valid input
     *
     * @return void
     */
    public function testUpdateContentUrl()
    {
        $contentUrl = ContentUrl::first();
        $url = $contentUrl->url;

        $contentUrl = $this->updateContentUrlAction->handle($contentUrl, $this->data);

        $this->assertNotEquals($contentUrl->url, $url);
        $this->assertEquals($this->data['url'], $contentUrl->url);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'url' => 'https://tester.test/rss'
        ];

        $this->updateContentUrlAction = app()->make(UpdateContentUrlAction::class);

        $this->seed(ContentUrlSeeder::class);
    }
}
