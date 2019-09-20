<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/zVgs64SMTGQ5qKFRAZMchHMVfuxHnFucB9cDtw8D.png';
        
        return "/storage/" . $imagePath;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class); // 1 profile -> 1 user
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
} 
