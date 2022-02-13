<?php

namespace App\Actions\Podcast;

use App\Actions\Abstracts\Action;
use App\Models\Podcast;

/**
 * Class CreatePodcastAction
 *
 * TEST: Whole Cloth | CreatePodcastTest.php
 * @package App\Actions\Podcast
 */
class CreatePodcastAction extends Action
{
    /**
     * @param array $data
     * @return Podcast
     */
    public function handle(array $data): Podcast
    {
        $podcast = new Podcast();
        $podcast->fill($data);
        $podcast->save();

        return $podcast;
    }
}
