<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
      'title','price','description','user_id','category_id'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function category(){
      return $this->belongsTo(Category::class,'category_id','id');
    }
    public function comments(){
      return $this->hasMany(Comment::class,'post_id','id');
    }

}
