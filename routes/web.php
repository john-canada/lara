<?php

/*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',[
    'uses'=>'mailController@index',
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

Auth::routes(['verify' => true]);
//Auth::routes();

Route::get('home', function () {
    // Only verified users may enter...
})->middleware('verified');

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
    'middleware'=>'auth'
]); 

Route::post('/checkout',[
    'uses'=>'productController@postcheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
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

Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'postIndex'
]);

Route::resource('posts','PostsController');//->middleware('checkuser');
//Route::resource('Comment','CommentsController');

Route::get('/commentindex/{id}',[
    'uses'=>'CommentsController@index',
    'as'=>'commentindex'
]);

Route::post('/postcomment/{post_id}',[
    'uses'=>'CommentsController@store',
    'as'=>'postcomment'
]);

Route::post('/category',[
    'uses'=>'CategoryController@store',
    'as'=>'category'
]);

Route::get('/category',[
    'uses'=>'CategoryController@index',
    'as'=>'category'
]);

Route::get('/displaycat/{id}',[
    'uses'=>'PostsController@category',
    'as'=>'displaycat'
]);