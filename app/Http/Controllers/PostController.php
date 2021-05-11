<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\User;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return  view('posts.create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
        
        $post->title = $request['post']['title'];
        $post->body = $request['post']['body'];
        $post->user_name =$request['post']['user_name'];
        $post->user_id =$request['post']['user_id'];
        $post->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }
    
    public function update(PostRequest $request,Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/index');
    }
    
    public function search(Request $request)
    {
        
        $posts=Post::where('title','like',"%$request->search%")
                ->orWhere('body','like',"%$request->search%")
                ->orderBy('updated_at', 'DESC')
                ->paginate(5);
        $search_result = $request->search.'の件数は'.$posts->total().'件です。';
        return view('posts.index')->with(['posts' => $posts,'search_result'=>$search_result,'search_query'=>$request->search]);  
       
        
    }
    
    
}
