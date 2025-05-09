<?php

namespace App\Models;

use App\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'movie_url',
        'images',
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
            'images'            => 'json',
            'genre'             => Genre::class,
        ];
    }

    /**
     * Get all of the seasons of the current content (show).
     */
    public function seasons(): hasMany
    {
        return $this->hasMany(Season::class);
    }

    /**
     * Get the season of the current content (episode).
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Determine if the current content is a series.
     */
    public function isSeries(): Attribute
    {
        return Attribute::get(fn(): bool => ! empty($this->season_id));
    }
}
