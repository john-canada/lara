<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use Session;
use DB;//optional;

class PostsController extends Controller
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
      $category=Category::with('posts')->orderBy('created_at','asc')->get(); 
      $posts=Post::orderBy('created_at','desc')->paginate(2);
       return view('blog.index')->with(['posts'=>$posts,'category'=>$category]); 
    }

    public function category($id)
    {
      
      $category=Category::with('posts')->orderBy('created_at','asc')->get();

    //   \DB::enableQueryLog(); 
    //     $posts=Post::orderBy('created_at','desc')
    //         ->where('category_id',$id)
    //         ->paginate(2);

    $posts=Category::find($id)
            ->posts()
            ->orderBy('created_at','asc')
            ->paginate(2);
      return view('blog.index')->with(['posts'=>$posts,'category'=>$category]);//->render(); 
   // dd(DB::getQueryLog()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();  
        $tags=Tag::all();
       return view('blog/create')->with(['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'body' =>'required',
            'category_id'=>'required',
            'image'=>'image|nullable|max:1999' 
           ]);
        
           //handle file upload
        if($request->hasfile('image')){
            //get file name with extension
            $fileNameWithExt=$request->file('image')->getClientOriginalName();
            //get just filename
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // get file extension
            $extention=$request->file('image')->getClientOriginalExtension();
            //file to store
            $fileNameToStore= $fileName.'_'.time().'.'.$extention; 
            //upload image
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        } else {
           $fileNameToStore='noimage.jpg';  
        }

           // create posts
           $post= new Post;
           $post->title=$request->title;
           $post->body=$request->body;
           $post->category_id=$request->category_id;
           $post->user_id=auth()->user()->id; 
           $post->images=$fileNameToStore;
           $post->save();
           //$post->tags()->sync($request->tags,false);
           if(isset($request->tags)){
            $post->tags()->sync($request->tags);
           }else{
            $post->tags()->sync(array());  
           }
           
           return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post=Post::find($id);
       $category = Category::find($post->category_id);
       return view('blog/show')->with(['post'=>$post,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
            if(auth()->user()->id !== $post->user_id){
               return redirect('/posts')->with('error','Unauthorised page');
            }
        return view('blog/edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required', 
            'image'=>'image|nullable|max:1999' 
           ]);
        
    //handle file upload
    if($request->hasfile('image')){
        //get file name
        $fileNameWithExt=$request->file('image')->getClientOriginalName();
        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        // get file extension
        $extention=$request->file('image')->getClientOriginalExtension();
        $fileNameToStore= $fileName.'_'.time().'.'.$extention; 
     
        //upload image
        $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
    }

           // update posts
           $post=Post::find($id);
           $post->title=$request->input('title');
           $post->body=$request->input('body');
           if($request->hasfile('image')){
             $post->images=$fileNameToStore;
           }
           $post->save();

           return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorised page');
         }

        if($post->image != 'noimage.jpg'){
            Storage::delete('public/images/'.$post->images);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Remove');
    }
}
