<?php

namespace App\Actions\Podcast;

use App\Actions\Abstracts\Action;
use App\Models\Podcast;

/**
 * Class DeletePodcastAction
 *
 * TEST: Whole Cloth | DeletePodcastTest.php
 * @package App\Actions\Podcast
 */
class DeletePodcastAction extends Action
{
    /**
     * @param Podcast $podcast
     * @return bool|null
     */
    public function handle(Podcast $podcast): ?bool
    {
        return $podcast->delete();
    }
}
