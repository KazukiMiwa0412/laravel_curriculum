<?php

namespace App\Http\Controllers;


use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return  view('create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('edit')->with(['post'=>$post]);
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
        return redirect('/');
    }
    
    public function search(Request $request)
    {
        dd($request->all());
        /*
        $posts=Post::where('title','like',"%$request->search%")
                ->orWhere('body','like',"%$request->search%")
                ->orderBy('updated_at', 'DESC')
                ->paginate(5);
        $search_result = $request->search.'の件数は'.$posts->total().'件です。';
        return view('index')->with(['posts' => $posts,'search_result'=>$search_result,'search_query'=>$request->search]);  
        */
        
    }
    
    
}
