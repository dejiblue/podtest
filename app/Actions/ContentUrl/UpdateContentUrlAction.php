<?php

namespace App\Actions\ContentUrl;

use App\Actions\Abstracts\Action;
use App\Models\ContentUrl;

/**
 * Class UpdateContentUrlAction
 *
 * TEST: Whole Cloth | UpdateContentUrlTest.php
 * @package App\Actions\ContentUrl
 */
class UpdateContentUrlAction extends Action
{
    /**
     * @param ContentUrl $contentUrl
     * @param array $data
     * @return ContentUrl
     */
    public function handle(ContentUrl $contentUrl, array $data): ContentUrl
    {
        $contentUrl->update($data);
        return $contentUrl;
    }
}
