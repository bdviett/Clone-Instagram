<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username,

            ]);
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class); // 1 user -> 1 profile
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC'); // 1 user -> n post
    }
    
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
}
