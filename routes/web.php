<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',[
    'uses'=>'pagesController@about',
    'as'=>'about',
]); 

Route::get('/services',[
    'uses'=>'pagesController@services',
    'as'=>'services',
]); 

Route::get('/shop',[
    'uses'=>'productController@product',
    'as'=>'shop',
]); 

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart',[
    'uses'=>'productController@getcart',
    'as'=>'cart',
]);

Route::get('/addToCart/{id}',[
    'uses'=>'productController@addToCart',
    'as'=>'addToCart',
]); 

Route::get('/checkout',[
    'uses'=>'productController@checkout',
    'as'=>'checkout',
]); 

Route::get('/postcheckout',[
    'uses'=>'productController@postcheckout',
    'as'=>'postcheckout',
]); 

Route::get('/reduceByOne/{id}',[
    'uses'=>'productController@getreduceByOne',
    'as'=>'reducebyone',
]); 

Route::get('/removeItems/{id}',[
    'uses'=>'productController@getremoveItems',
    'as'=>'removeItems',
]); 

Route::get('/addItem/{id}',[
    'uses'=>'productController@addOneItem',
    'as'=>'additem',
]); 

Route::get('/index',[
    'uses'=>'mailController@index',
    'as'=>'index',
]); 

Route::post('/send',[
    'uses'=>'mailController@send',
    'as'=>'send'
]); 