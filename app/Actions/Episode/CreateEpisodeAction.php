<?php

namespace App\Actions\Episode;

use App\Actions\Abstracts\Action;
use App\Models\Episode;

/**
 * Class CreateEpisodeAction
 *
 * TEST: Whole Cloth | CreateEpisodeTest.php
 * @package App\Actions\Episdoe
 */
class CreateEpisodeAction extends Action
{
    /**
     * @param array $data
     * @return Episode
     */
    public function handle(array $data): Episode
    {
        return Episode::firstOrCreate([
            'title' => $data['name'],
            'description' => $data['description'],
            'audio_url' => $data['audioUrl'],
            'episode_url' => $data['episodeUrl'],
            'podcast_id' => $data['podcastId'],
        ]);
    }
}
