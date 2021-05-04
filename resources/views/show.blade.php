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
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p class="body">{{ $post->body }}</p>    
            </div>
        </div>
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return deletePost(this);">delete</button> 
        </form>
        
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e){
                if(confirm('削除すると復元できません。\n本当に削除しますか')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>

