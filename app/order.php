<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
   function user(){
      return $this->belongsTo('App\User'); 
   }
}
