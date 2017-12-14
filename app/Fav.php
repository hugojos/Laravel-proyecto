<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    protected $table = "fav";

    protected $fillable = [
      'id','user_id','post_id'
    ];
    public function posts(){
      return $this->hasMany(Post::class,'id','post_id');
    }
}
