<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $tweets
 * @property mixed $blogposts
 * @property mixed $id
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweets(): HasMany
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * @return HasMany
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogposts(): HasMany
    {
        return $this->hasMany(Blogpost::class);
    }


}
