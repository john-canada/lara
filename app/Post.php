<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //change table name
    Protected $table='posts';
    
    // change primary key
    public $primaryKey='id';

    // timestamp
    public $timestamps=true;
    
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

    public function tags(){
      return $this->belongsToMany(Tag::class);
    }

}
