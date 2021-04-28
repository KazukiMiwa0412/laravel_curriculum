<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
    </head>
    <body>
        <h1>編集画面</h1>
        <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" value="{{$post->title}}"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="">{{$post->body}}</textarea>
            </div>
            <input type="submit" value="更新"/>
        </form>
        <div class="back">[<a href="/posts/{{$post->id}}">back</a>]</div>
    </body>
</html>
