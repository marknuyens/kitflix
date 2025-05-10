<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WatchSession extends Model
{
    /** @use HasFactory<\Database\Factories\WatchSessionFactory> */
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'content_id',
        'played_length',
        'is_complete',
        'is_favorite',
        'is_offline',
        'review_score'
    ];

    /**
     * Get the season of the current content (episode).
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
