<?php

namespace App\Models;

use App\Exceptions\ArtistHasAlbumsException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    
    /**
     * Relationship
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
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
        static::deleting(function ($user) {
            if ($user->albums()->exists()) {
                throw new ArtistHasAlbumsException();
            }
        });
    }

    /**
     * Search logic
     */
    public function scopeSearch(Builder $query, $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%");
        });
    }
}

