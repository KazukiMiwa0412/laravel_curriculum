@extends('layouts.layout')
@section('child')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>
            {{ $user->items()[0]->user_name }}の投稿
        </h2>
        <!-- 検索フォーム -->
        <form action="{{ route('users.search') }}" method="get">
            <input type="text" name="search" placeholder="入力" value="">
            <input type="hidden" name="user_name" value="{{ $user->items()[0]->user_name }}">
            
            <button type="submit">検索</button>
            <select name="orderby">
                <option value="desc">desc</option>
                <option value="asc">asc</option>
            </select>
            @error('search')
                <span class="" role="alert" style="color:red;">
                    <strong><br>{{ $message }}</strong>
                </span>
            @enderror
        </form>
        @isset($search_result)
            <h5>{{$search_result}}</h5>
        @endisset
        <div class='posts'>
            @foreach ($user->items() as $post)
                <div class='post'>
                    <h3><a href="{{ route('posts.show' , $post->id) }}">{{ $post->title }}</a></h3>
                    <a href="{{ route('users.show',$post->user_name)}}">{{ $post->user_name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        {{ $user->links('vendor.pagination.sample-pagination') }}
    </body>
</html>
@endsection