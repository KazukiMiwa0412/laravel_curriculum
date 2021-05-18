@extends('layouts.layout')
@section('child')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            body {
                background-image: url("/storage/sample_pic.jpg");
                background-size:cover;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
    </head>
    <body>
        <h1>サンプルブログ</h1>
        <form action="{{ route("posts.store") }}" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="投稿"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <input type="hidden" name="post[user_name]" value="{{ Auth::user()->name }}">
            <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="{{ route("posts.index") }}">back</a>]</div>
    </body>
</html>
@endsection