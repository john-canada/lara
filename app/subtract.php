<?php

namespace App;

class subtract{
 
   // public $data = null;

    public function __construct(){

    }

    public function sub($a, $b){  
      $data =  $a - $b;
      if($data<=0){
        $data++;
      } 
       return $data;    
    }
}
