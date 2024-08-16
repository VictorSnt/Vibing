<?php

namespace App\Models;

use App\Exceptions\SongHasInteractionsException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Song extends Model
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
        return $this->belongsToMany(
            Playlist::class, 'playlist_song', 'song_id', 'playlist_id'
        )->withTimestamps();
    }

    protected static function booted()
    {
        static::deleting(function ($song) {
            if ($song->playlists()->exists()) {
                throw new SongHasInteractionsException;
            }
            
            if ($song->likes()->exists()) {
                throw new SongHasInteractionsException;
            }
        });
    }

    public function scopeSearch(Builder $query, $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%");
        });
    }
}
