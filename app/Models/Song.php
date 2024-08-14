<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends BaseModel
{
    use HasFactory;

    protected $fillable = ['title', 'artist_id', 'album_id', 'duration'];

    protected $casts = ['duration' => 'integer',];
    
    
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song')->withTimestamps();
    }

    public function scopeSearch(Builder $query, $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%");
        });
    }
}
