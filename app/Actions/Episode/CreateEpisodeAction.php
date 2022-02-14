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
            'title' => $data['title'],
            'description' => $data['description'],
            'audio_url' => $data['audio_url'],
            'episode_url' => $data['episode_url'],
            'podcast_id' => $data['podcast_id'],
        ]);
    }
}
