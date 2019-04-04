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

}
