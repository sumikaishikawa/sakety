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
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
{
    // confirm if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->followings()->attach($userId);
        return true;
    }
}

    public function unfollow($userId)
    {
        // confirming if already following
        $exist = $this->is_following($userId);
        // confirming that it is not you
        $its_me = $this->id == $userId;
    
    
        if ($exist && !$its_me) {
            // stop following if following
            $this->followings()->detach($userId);
            return true;
        } else {
            // do nothing if not following
            return false;
        }
    }
    
    
    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_microposts()
    {
        $follow_user_ids = $this-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Micropost::whereIn('user_id', $follow_user_ids);
    }
    
    
    public function favoritings()
    {
        return $this->belongsToMany(Micropost::class, 'user_favorite', 'user_id', 'favorite_id')->withTimestamps();
    }
   
    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'user_favorite', 'favorite_id', 'user_id')->withTimestamps();
    }

    public function favorites($micropostId)
     {
         // confirm if already following
         $exist = $this->is_favoritings($micropostId);
         // confirming that it is not you
         $its_me = $this->id == $micropostId;

         if ($exist) {
          // do nothing if already following
         return false;
         } else {
         // follow if not following
         //$thisはインスタンス自身を指す特別な関数（例：$a->favorites($micropostId=1) = $this）
         //以下のコードの意味
         //未ファボのmicropostをファボしたとき、favoritings()に$micropostId=1を追加する
         $this->favoritings()->attach($micropostId);
         return true;
        }
    }

    public function unfavorites($micropostId)
     {
         // confirming if already following
         $exist = $this->is_favoritings($micropostId);
         // confirming that it is not you
         $its_me = $this->id == $micropostId;


         if ($exist) {
         // stop following if following
         $this->favoritings()->detach($micropostId);
         return true;
         } else {
        // do nothing if not following
        return false;
    }
}


    public function is_favoritings($micropostId) {
          return $this->favoritings()->where('favorite_id', $micropostId)->exists();
}

}
