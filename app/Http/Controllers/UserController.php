<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        //$user->load('posts');
        $user=$user->posts()->paginate(5);
        //dd($user->items()[0]);
        return view('users.show')->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function search(Request $request)
    {
        $request->validate([
            'search'=>'required'
        ]);
       if($request->orderby=='desc'){
            $posts=Post::where('title','like',"%$request->search%")
                    ->orWhere('body','like',"%$request->search%")
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(5);
        }elseif($request->orderby=='asc'){
            $posts=Post::where('title','like',"%$request->search%")
                    ->orWhere('body','like',"%$request->search%")
                    ->orderBy('updated_at', 'ASC')
                    ->paginate(5);
        }
        
        $search_result = $request->search.'????????????'.$posts->total().'????????????';
        $user_name= $request->user_name;
        return view('posts.index')->with(['posts' => $posts,'search_result'=>$search_result,'search_query'=>$request->search,'user_name'=>$user_name,'search_orderby'=>$request->orderby]);  
       
        
    }
}
