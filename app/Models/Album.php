<?php

namespace App\Models;

use App\Exceptions\AlbumHasSongsException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'artist_id'];


    /**
     * Relationship
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Relationship
     */
    public function songs()
    {
        return $this->hasMany(Song::class);
    }


    /**
     * SoftDeleting Rules
     */
    protected static function booted()
    {
        static::deleting(function ($album) {
            if ($album->songs()->exists()) {
                throw new AlbumHasSongsException();
            }
        });
    }

    /**
     * Search logic
     */
    public function scopeSearch(Builder $query, $searchTerm)
    {
        return $query->join('artists', 'albums.artist_id', '=', 'artists.id')
        ->where(function ($q) use ($searchTerm) {
            $q->where('albums.name', 'like', "%{$searchTerm}%")
                ->orWhere('artists.name', 'like', "%{$searchTerm}%");
        })
        ->select('albums.*');;
    }
}
