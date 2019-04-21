<?php

namespace App\Http\Controllers;
use App\product;
use App\Order;
use App\Cart;
use App\subtract;
use Session;
use Mail;
Use App\Mail\sendmail;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class productController extends Controller
{

  public function __construct()
  {
   //   $this->middleware('auth');
  }

   public function product(){

    // $mydata = new subtract();
    // $data = $mydata->sub(5,5);
    
      if(!Cache::has('product')){
         // $products = product::all();
              $products = product::all()->map(function($product){
                       return [
                          'id'=>$product->id,
                          'image_path'=>$product->image_path, 
                          'title'=>$product->title,
                          'description'=>$product->description,
                          'price'=>$product->price
                       ];
                      })->toArray();
        
            Cache::put('product',$products);
              }else{
          $products = Cache::get('product',product::all());
          }
     //  dd($products);
      return view('pages/shop')->with(['products'=>$products]);
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

      if(!Session::has('cart')){
        return redirect('/shop');  
      }
            $oldcart = Session::get('cart');
            $cart = new Cart($oldcart);
 
            Stripe::setApiKey("sk_test_rfoFsJV1INouU7vDiXqjqkdJ");

              try{
           
                    $token = $_POST['stripeToken'];
                    $charge = Charge::create([
                        'amount' =>$cart->totalprice * 100 ,
                        'currency' => 'usd',
                        'description' => 'Product charge',
                        'source' => $token,
                    ]);
                    
                        $order = new Order();
                        $order->name=$request->input('name'); 
                        $order->phone=$request->input('phone');
                        $order->address=$request->input('address');
                        $order->cart=serialize($cart); 
                        $order->payment_id=$charge->id; 
                        $order->amount=$charge->amount;
                        Auth::User()->orders()->save($order);  
                                     
            } catch (\Exception $e){
                    return redirect()->route('checkout')->with('error', $e->getMessage());
                }

            Session::forget('cart');  
            return redirect('/shop')->with('success','Successfully purchased');
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

 function getdata(){
    $mydata = new subtract();
    $data=$mydata->sub(10,2);
    return redirect('shop')->with('data',$data);
 }

}//end of class


