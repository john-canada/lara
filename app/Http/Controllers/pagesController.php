<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function about(){
        return view('pages/about');
    }

    public function services(){
        return view('pages/services');
    }

    public function shop(){
        return view('pages/shop');
    }
}
