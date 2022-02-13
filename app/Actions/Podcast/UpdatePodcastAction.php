<?php

namespace App\Actions\Podcast;

use App\Actions\Abstracts\Action;
use App\Models\Podcast;

/**
 * Class UpdatePodcastAction
 *
 * TEST: Whole Cloth | UpdatePodcastTest.php
 * @package App\Actions\Podcast
 */
class UpdatePodcastAction extends Action
{
    /**
     * @param Podcast $podcast
     * @param array $data
     * @return Podcast
     */
    public function handle(Podcast $podcast, array $data): Podcast
    {
        $podcast->update($data);
        return $podcast;
    }
}
