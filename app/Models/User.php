<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token, $this->email));
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function likedSongs()
    {
        return $this->belongsToMany(Song::class, 'likes')->withTimestamps();
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->playlists()->exists()) {
                throw new \Exception("Cannot delete user with associated playlists.");
            }
            
            if ($user->likedSongs()->exists()) {
                throw new \Exception("Cannot delete user with associated liked songs.");
            }
        });
    }

    public function scopeSearch(Builder $query, $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%");
            $q->orWhere('email', 'like', "%{$searchTerm}%");
        });
    }
}
