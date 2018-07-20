<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id', 'dateto_id', 'datefrom_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'user_favorite', 'favorite_id', 'user_id')->withTimestamps();
    }
    
    public function doners()
    {
        return $this->hasMany(User::class, 'user_done', 'done_id', 'user_id')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
        
    }
    
    public function doneings()
    {
        return $this->belongsToMany(User::class, 'user_done', 'user_id', 'done_id')->withTimestamps();
    }
    
}
