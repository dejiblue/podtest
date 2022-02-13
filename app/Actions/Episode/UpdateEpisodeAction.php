<?php

namespace App\Actions\Episode;

use App\Actions\Abstracts\Action;
use App\Models\Episode;

/**
 * Class UpdateEpisodeAction
 *
 * TEST: Whole Cloth | UpdateEpisodeTest.php
 * @package App\Actions\Episdoe
 */
class UpdateEpisodeAction extends Action
{
    /**
     * @param Episode $episode
     * @param array $data
     * @return Episode
     */
    public function handle(Episode $episode, array $data): Episode
    {
        $episode->update([
            'title' => $data['title'] ??  $episode->title,
            'description' => $data['description'] ?? $episode->description,
            'audio_url' => $data['audioUrl'] ?? $episode->audio_url,
            'episode_url' => $data['episodeUrl'] ?? $episode->episode_url,
        ]);
        return $episode;
    }
}
