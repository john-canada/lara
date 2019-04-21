<?php

namespace App;

class cart{
    public $items=null;
    public $totalQTY=0;
    public $totalprice=0;

    public function __construct($oldcart){
        if($oldcart){
            $this->items=$oldcart->items;
            $this->totalQTY=$oldcart->totalQTY;
            $this->totalprice=$oldcart->totalprice;
        }

    }

    public function add($item,$id){
       $storedItems=['qty'=>0, 'price'=>$item->price,'item'=>$item];
    
     if($this->items){
          if(array_key_exists($id,$this->items)){
            $storedItems=$this->items[$id];
          }
     }
     $storedItems['qty']++;
     $storedItems['price']=$item->price * $storedItems['qty'];
     $this->items[$id]=$storedItems;
     $this->totalQTY++;
     $this->totalprice+=$item->price;
  }

  public function reduceByOne($id){
    $this->items[$id]['qty']--;
    $this->items[$id]['price']-=$this->items[$id]['item']['price'];
    $this->totalQTY--;
    $this->totalprice-=$this->items[$id]['item']['price'];

    if($this->items[$id]['qty']<=0){
      unset($this->items[$id]);
    }
  }

  public function removeItems($id){
    if(isset($this->items[$id]['qty'])){
      $this->totalQTY-=$this->items[$id]['qty'];
      $this->totalprice-=$this->items[$id]['price'];
    }
    unset($this->items[$id]);
  }
}
