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
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    
    public function joined_microposts()
    {
        return $this->belongsToMany(Micropost::class, 'user_favorite',  'user_id', 'favorite_id')->withTimestamps();
    }
    
    public function done_microposts()
    {
        return $this->belongsToMany(Micropost::class, 'user_done',  'user_id', 'done_id')->withTimestamps();
    }
    
    public function point()
    {
        return $this->hasMany(Point::class);
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
    
    public function feed_comments()
    {
        $follow_user_ids = $this-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Comment::whereIn('user_id', $follow_user_ids);
    }
    
    public function feed_point()
    {
        $follow_user_ids = $this-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Comment::whereIn('user_id', $follow_user_ids);
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

    public function is_doneings($micropostId) {
          return $this->doneings()->where('done_id', $micropostId)->exists();
}

    static function select($userId) {
        $user = User::find($userId);
        return $user->doneings()->exists();
    }

    public function done($micropostId)
     {
         // confirm if already following
         $exist = $this->is_doneings($micropostId);
         // confirming that it is not you
        //  $its_me = $this->id == $micropostId;

         if ($exist) {
          // do nothing if already following
         return false;
         } else {
         // follow if not following
         //$thisはインスタンス自身を指す特別な関数（例：$a->favorites($micropostId=1) = $this）
         //以下のコードの意味
         //未ファボのmicropostをファボしたとき、favoritings()に$micropostId=1を追加する
         $this->doneings()->attach($micropostId);
         return true;
        }
    }

    public function undone($micropostId)
     {
         // confirming if already following
         $exist = $this->is_doneings($micropostId);
         // confirming that it is not you
        //  $its_me = $this->id == $micropostId;

         if ($exist) {
         // stop following if following
         $this->doneings()->detach($micropostId);
         return true;
         } else {
        // do nothing if not following
        return false;
    }
}

    public function doneings()
    {
        return $this->belongsToMany(Micropost::class, 'user_done', 'user_id', 'done_id')->withTimestamps();
    }
    
    
    static function image_map($user_id) {
    $array = [
        

        '1' =>	 'images/Picture1.png',
        '2' =>	 'images/Picture2.png',
        '3' =>	 'images/Picture3.png',
        '4' =>	 'images/Picture4.png',
        '5' =>	 'images/Picture5.png',
        '6' =>	 'images/Picture6.png',
        '7' =>	 'images/Picture7.png',
        '8' =>	 'images/Picture8.png',
        '9' =>	 'images/Picture1.png',
        '10' =>	 'images/Picture2.png',
        '11' =>	 'images/Picture3.png',
        '12' =>	 'images/Picture4.png',
        '13' =>	 'images/Picture5.png',
        '14' =>	 'images/Picture6.png',
        '15' =>	 'images/Picture7.png',
        '16' =>	 'images/Picture8.png',
        '17' =>	 'images/Picture1.png',
        '18' =>	 'images/Picture2.png',
        '19' =>	 'images/Picture3.png',
        '20' =>	 'images/Picture4.png',
        '21' =>	 'images/Picture5.png',
        '22' =>	 'images/Picture6.png',
        '23' =>	 'images/Picture7.png',
        '24' =>	 'images/Picture8.png',
        '25' =>	 'images/Picture1.png',
        '26' =>	 'images/Picture2.png',
        '27' =>	 'images/Picture3.png',
        '28' =>	 'images/Picture4.png',
        '29' =>	 'images/Picture5.png',
        '30' =>	 'images/Picture6.png',
        '31' =>	 'images/Picture7.png',
        '32' =>	 'images/Picture8.png',
        '33' =>	 'images/Picture1.png',
        '34' =>	 'images/Picture2.png',
        '35' =>	 'images/Picture3.png',
        '36' =>	 'images/Picture4.png',
        '37' =>	 'images/Picture5.png',
        '38' =>	 'images/Picture6.png',
        '39' =>	 'images/Picture7.png',
        '40' =>	 'images/Picture8.png',
        '41' =>	 'images/Picture1.png',
        '42' =>	 'images/Picture2.png',
        '43' =>	 'images/Picture3.png',
        '44' =>	 'images/Picture4.png',
        '45' =>	 'images/Picture5.png',
        '46' =>	 'images/Picture6.png',
        '47' =>	 'images/Picture7.png',
        '48' =>	 'images/Picture8.png',
        '49' =>	 'images/Picture1.png',
        '50' =>	 'images/Picture2.png',
        '51' =>	 'images/Picture3.png',
        '52' =>	 'images/Picture4.png',
        '53' =>	 'images/Picture5.png',
        '54' =>	 'images/Picture6.png',
        '55' =>	 'images/Picture7.png',
        '56' =>	 'images/Picture8.png',
        '57' =>	 'images/Picture1.png',
        '58' =>	 'images/Picture2.png',
        '59' =>	 'images/Picture3.png',
        '60' =>	 'images/Picture4.png',
        '61' =>	 'images/Picture5.png',
        '62' =>	 'images/Picture6.png',
        '63' =>	 'images/Picture7.png',
        '64' =>	 'images/Picture8.png',
        '65' =>	 'images/Picture1.png',
        '66' =>	 'images/Picture2.png',
        '67' =>	 'images/Picture3.png',
        '68' =>	 'images/Picture4.png',
        '69' =>	 'images/Picture5.png',
        '70' =>	 'images/Picture6.png',
        '71' =>	 'images/Picture7.png',
        '72' =>	 'images/Picture8.png',

    
        
        
//         // ここを複製しまくる
    ];

    return $array[$user_id];
}

}
