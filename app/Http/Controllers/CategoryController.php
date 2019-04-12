<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleWare('auth',['except'=>['create','show','edit','destroy','update']]);
    }

    public function index()
    {
       $categories = Category::all();
       return view('category.create')->with('categories',$categories);
    }
   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $category = new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
