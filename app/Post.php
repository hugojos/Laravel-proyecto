<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
      'title','price','description','user_id'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
    
}
