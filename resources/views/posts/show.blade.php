@extends('layouts.layout')
@section('child')

<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <style>
            .content__post .body{
                background-color: pink;
                border: solid;
                width:20%;
            }
            
            body {
                background-image: url("/storage/sample_pic.jpg");
                background-size:cover;
            }
            .contents{
                margin:50px;
            }
            .title{
                margin-bottom:50px;
            }
            .user_name{
                margin-bottom:50px;
            }
            .content{
                margin-bottom:50px;
            }
            button{
                width:100px;
                text-align:center;
            }
            .edit{
                margin:50px 0;
                font-size:20px;
                background-color:#EEEEEE;
                width:100px;
                text-align:center;
                border:solid;
                border-width:thin;
            }
            .footer{
                margin:50px 0;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class = "contents">
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <div class="user_name">
                <h2>投稿者</h2>
                <p>{{ $post->user_name }}</p>
            </div>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p class="body">{{ $post->body }}</p>    
                </div>
            </div>
            
            @if ($post->user_name == Auth::user()->name  )
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return deletePost(this);">delete</button> 
                </form>
                <p class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></p>
            @endif
            
            <div class="footer">
                <a href="/index">戻る</a>
            </div>
            <script>
                function deletePost(e){
                    if(confirm('削除すると復元できません。\n本当に削除しますか')){
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
        </div>
    </body>
</html>

@endsection