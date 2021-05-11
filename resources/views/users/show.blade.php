@extends('layout')
@section('child')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        
        <style>
            body {
                background-image: url("/storage/sample_pic.jpg");
                background-size:cover;
            }
            .post .body{
                background-color: pink;
                border: solid;
                width:35%;
            }
            
            .page_title{
                margin-bottom:100px;
            }
            .menu-btn {
                position: fixed;
                top: 10px;
                right: 10px;
                display: flex;
                height: 60px;
                width: 60px;
                justify-content: center;
                align-items: center;
                z-index: 90;
                background-color: #3584bb;
            }
            .menu-btn span,
            .menu-btn span:before,
            .menu-btn span:after {
                content: '';
                display: block;
                height: 3px;
                width: 25px;
                border-radius: 3px;
                background-color: #ffffff;
                position: absolute;
            }
            .menu-btn span:before {
                bottom: 8px;
            }
            .menu-btn span:after {
                top: 8px;
            }
            #menu-btn-check:checked ~ .menu-btn span {
                background-color: rgba(255, 255, 255, 0);/*メニューオープン時は真ん中の線を透明にする*/
            }
            #menu-btn-check:checked ~ .menu-btn span::before {
                bottom: 0;
                transform: rotate(45deg);
            }
            #menu-btn-check:checked ~ .menu-btn span::after {
                top: 0;
                transform: rotate(-45deg);
            }
            #menu-btn-check {
                display: none;
            }
            .menu-content ul {
                padding: 70px 50px 0;
            }
            .menu-content ul li {
                border-bottom: solid 1px #ffffff;
                list-style: none;
                display: inline;
            }
            .menu-content ul li a {
                display: block;
                width: 20%;
                font-size: 15px;
                box-sizing: border-box;
                color:#ffffff;
                text-decoration: none;
                padding: 9px 0 10px 0;
                position: relative;
            }
            .menu-content ul li a::before {
                content: "";
                width: 7px;
                height: 7px;
                border-top: solid 2px #ffffff;
                border-right: solid 2px #ffffff;
                transform: rotate(45deg);
                position: absolute;
                right: 11px;
                top: 16px;
            }
            .menu-content {
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                left: 100%;/*leftの値を変更してメニューを画面外へ*/
                z-index: 80;
                background-color: #3584bb;
                transition: all 0.5s;/*アニメーション設定*/
            }
            #menu-btn-check:checked ~ .menu-content {
                left: 70%;/*メニューを画面内へ*/
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>
            {{ $user->posts[0]->user_name }}の投稿
        </h2>
        <!-- 検索フォーム -->
        <form action="{{url('/users/search')}}" method="get">
            <input type="text" name="search" placeholder="入力" value="">
            <input type="hidden" name="user_name" value="{{ $user->posts[0]->user_name }}">
            <input type="hidden" name="user_data" value="{{ $user }}">
            <button type="submit">検索</button>
        </form>
        @isset($search_result)
            <h5>{{$search_result}}</h5>
        @endisset
        <div class='posts'>
            @foreach ($user->posts as $post)
                <div class='post'>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    <a href="{{ route('users.show',$post->user_name)}}">{{ $post->user_name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection