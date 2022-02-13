<?php

namespace App\Actions\ContentUrl;

use App\Actions\Abstracts\Action;
use App\Models\ContentUrl;

/**
 * Class DeleteContentUrlAction
 *
 * TEST: Whole Cloth | DeleteContentUrlTest.php
 * @package App\Actions\ContentUrl
 */
class DeleteContentUrlAction extends Action
{
    /**
     * @param ContentUrl $contentUrl
     * @return bool|null
     */
    public function handle(ContentUrl $contentUrl): ?bool
    {
        return $contentUrl->delete();
    }
}
