<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //table name
    Protected $table='posts';
    
    // primary key
    public $primaryKey='id';

    // timestamp
    public $timestamps=true;
    
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function categories(){
      return $this->belongsTo(Category::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

    public function tags(){
      return $this->belongsToMany(Tag::class);
    }

}
