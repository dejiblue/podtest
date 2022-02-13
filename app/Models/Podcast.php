<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Podcast
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $language
 * @property string $artwork_url
 * @property string $rss_feed_url
 * @property string $website_url
 *
 */
class Podcast extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'language',
        'artwork_url',
        'rss_feed_url',
        'website_url',
    ];

    /**
     * Get the episodes that that belongs to this podcast.
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}
