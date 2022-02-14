<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $podcast = new Podcast();
        $podcast->title = 'test title';
        $podcast->description = 'test description';
        $podcast->website_url = 'https://test.website.test';
        $podcast->rss_feed_url = 'https://test.rssfeeed.test';
        $podcast->language = 'test language';
        $podcast->artwork_url = 'https://test.test.test';
        $podcast->save();

        Episode::insert([
            'title' => 'Sample episode',
            'description' => 'Sample description',
            'episode_url' => 'https://www.sample.com/d/playlist/2b46',
            'audio_url' => 'https://www.sample.com/d/playlist/2b46',
            'podcast_id' => $podcast->id,
        ]);
    }
}
