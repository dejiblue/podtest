<?php

namespace Tests\Feature;

use App\Actions\ContentUrl\CreateContentUrlAction;
use App\Models\ContentUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateContentUrlTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var CreateContentUrlAction
     */
    private $createContentUrlAction;

    /**
     * Test to see if we can create a list of rss urls with valid input
     *
     * @return void
     */
    public function testCreateContentUrl()
    {
        $url = $this->createContentUrlAction->handle($this->data);

        $this->assertModelExists($url);
        $this->assertInstanceOf(ContentUrl::class, $url);
        $this->assertEquals($this->data['url'], $url->url);
    }

    /**
     * Fixture used for each test
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'url' => 'https://nosleeppodcast.libsyn.com/rss'
        ];

        $this->createContentUrlAction = app()->make(CreateContentUrlAction::class);
    }
}
