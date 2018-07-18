<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['point', 'user_id','point_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function micropost()
    {
        return $this->belongsTo(Micropost::class);
    }
}
