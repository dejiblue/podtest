<?php

namespace App\Actions\Episode;

use App\Actions\Abstracts\Action;
use App\Models\Episode;

/**
 * Class DeleteEpisodeAction
 *
 * TEST: Whole Cloth | DeleteEpisodeTest.php
 * @package App\Actions\Episdoe
 */
class DeleteEpisodeAction extends Action
{
    /**
     * @param Episode $episode
     * @return bool|null
     */
    public function handle(Episode $episode): ?bool
    {
        return $episode->delete();
    }
}
