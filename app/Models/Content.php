<?php

namespace App\Models;

use App\Genre;
use App\Models\WatchSession;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'content';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'season_id',
        'episode',
        'title',
        'description',
        'trailer_url',
        'video_url',
        'image_url',
        'genre',
        'subgenre',
        'length',
        'language',
        'released_at',
        'cast',
        'safe_for_children',
        'content_labels',
        'meta_data',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'released_at'       => 'date',
            'cast'              => 'json',
            'safe_for_children' => 'boolean',
            'content_labels'    => 'json',
            'meta_data'         => 'json',
            'genre'             => Genre::class,
        ];
    }

    /**
     * Get all of the content's current watch sessions.
     */
    public function watch_sessions(): hasMany
    {
        return $this->hasMany(WatchSession::class);
    }

    /**
     * Scope a query to only include popular content.
     * 
     * @param  ?int  $limit  The amount of content.
     */
    protected function popular(?int $limit = 10): Builder
    {
        return self::query()
            ->join('watch_sessions', 'content.id', '=', 'content_id')
            ->selectRaw('content.*, COUNT(*) as count')
            ->groupBy('content_id')
            ->orderBy('count', 'desc')
            ->limit($limit);
    }

    /**
     * Normalize the video URL to one that's supported by embedding.
     */
    public function embedUrl(): Attribute
    {
        return Attribute::get(fn(): string => str_replace('/watch?v=', '/embed/', $this->video_url));
    }

}
