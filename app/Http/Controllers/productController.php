<?php

namespace App\Http\Controllers;
use App\product;
use App\cart;
use Session;
use Illuminate\Http\Request;

class productController extends Controller
{
   public function product(){
       $products = product::all();
       return view('pages/shop')->with('products',$products);
   }

   public function getcart(){
       if(!Session::has('cart')){
         return redirect('/shop');
       }
     
       $oldcart=Session::get('cart');
       $cart= new Cart($oldcart);
       
    return view('products/cart',[
        'products'=>$cart->items,
        'totalprice'=>$cart->totalprice
        ]);
   }

   public function addToCart(Request $request, $id){
            $product=product::find($id);
            $oldcart=Session::has('cart')? Session::get('cart'):null;
            $cart=new cart($oldcart);
            $cart->add($product,$product->id);
            $request->session()->put('cart',$cart);
           // dd($request->session()->get('cart'));
        return redirect('/shop');
      
   }

   public function addOneItem(Request $request, $id){
      $product=product::find($id);
      $oldcart=Session::has('cart')? Session::get('cart'):null;
      $cart=new cart($oldcart);
      $cart->add($product,$product->id);
      $request->session()->put('cart',$cart);
    // dd($request->session()->get('cart'));
     return redirect('/cart');

}

      public function checkout(){
        $oldcart=Session::get('cart');
        $cart= new Cart($oldcart);
        $totalprice=$cart->totalprice;
        return view('products/checkout')->with('totalprice',$totalprice);
    }
     
    public function postcheckout(Request $request){
       dd($request);
     }
   

    // reduce cart items by one at a time

    public function getreduceByOne($id){
      $oldcart=Session::has('cart') ? Session::get('cart'):null;
      $cart= new Cart($oldcart);
      $cart->reduceByOne($id);

      if( count ($cart->items) > 0 ){
        Session::put('cart',$cart);
         }else{
        Session::forget('cart');
      }
      return redirect()->route('cart');
  }

  // Empty cart items
   
  public function getremoveItems($id){
    $oldcart = Session::has('cart')? Session::get('cart'):null;
    $cart = new Cart($oldcart);
    $cart->removeItems($id);

    if( count ( $cart->items  ) > 0 ){
      Session::put('cart' , $cart);
    }else{
      Session::forget('cart');
    }
    return redirect()->route('cart');
 }

}

