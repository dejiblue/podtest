<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContentUrl
 * @package App\Models
 *
 * @property int $id
 * @property string $url
 * @property boolean $status
 *
 */
class ContentUrl extends Model
{
    use HasFactory;

    protected $table = 'content_urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'status',
    ];
}
