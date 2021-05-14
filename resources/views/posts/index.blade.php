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
        @isset($user_name)
            <h2>{{ $user_name }}の投稿</h2>
        @endisset
        <!-- 検索フォーム -->
        @if(isset($user_name))
            <form action="{{ route('users.search') }}" method="get">
                <input type="text" name="search" placeholder="入力" value="">
                <input type="hidden" name="user_name" value="{{  $user_name }}">
                <button type="submit">検索</button>
        @else
            <form action="{{ route('posts.search') }}" method="get">
                <input type="text" name="search" placeholder="入力" value="">
                <button type="submit">検索</button>
        @endif
                
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
            <h5>{{ $search_result }}</h5>
        @endisset
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3><a href="{{ route('posts.show' , $post->id) }}">{{ $post->title }}</a></h3>
                    <h3><a href="{{ route('users.show' , $post->user_id) }}">{{ $post->user_name }}</a></h3>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            @if(isset($search_query))
                {{ $posts->appends(['search' =>$search_query,'orderby'=>$search_orderby])->links('vendor.pagination.sample-pagination') }}
            @else
                {{ $posts->links('vendor.pagination.sample-pagination') }}
            @endif
        </div>
    </body>
</html>

@endsection