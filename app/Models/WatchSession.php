<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchSession extends Model
{
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
    ];
}
