<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'id','alias','first_name','last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
      return $this->hasMany(Post::class);
    }

    public function favs(){
      return $this->hasMany(Fav::class,'user_id','id');
    }

}
