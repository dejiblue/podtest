<?php

namespace App\Actions\ContentUrl;

use App\Actions\Abstracts\Action;
use App\Models\ContentUrl;

/**
 * Class CreateContentUrlAction
 *
 * TEST: Whole Cloth | CreateContentUrlTest.php
 * @package App\Actions\ContentUrl
 */
class CreateContentUrlAction extends Action
{
    /**
     * @param array $data
     * @return ContentUrl
     */
    public function handle(array $data): ContentUrl
    {
        $contentUrl = new ContentUrl();
        $contentUrl->fill($data);
        $contentUrl->save();

        return $contentUrl;
    }
}
