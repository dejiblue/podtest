<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Episode
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $audio_url
 * @property string $episode_url
 * @property string $rss_feed_url
 * @property int $podcast_id
 * 
 */
class Episode extends Model
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
        'audio_url',
        'episode_url',
        'rss_feed_url',
        'podcast_id',
    ];

    /**
     * Get the podcast associated with the episode.
     */
    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }
}
