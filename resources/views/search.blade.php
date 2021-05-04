<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        
        <style>
            /*
            body {
                background-image: url("/blog/public/storage/ウユニ塩湖.jpg");
            }
            */
            .post .body{
                background-color: pink;
                border: solid;
                width:35%;
            }
            
            .create{
                margin-top:100px;
                margin-bottom:100px;
                padding:50px;
                font-size:60px;
                border:solid;
                width:50%;
                text-align:center;
                background-color:aqua;
            }
            .page_title{
                margin-bottom:100px;
            }
            
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="page_title">サンプルブログ</h1>
        <form action="{{'/posts/search'}}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="入力">
            <button type="submit">検索</button>
        </form>
        <h5>{{$search_result}}</h5>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <p class="create"><a href="/posts/create">記事作成</a></p>
        <div class='paginate'>
            {{ $posts->links('vendor.pagination.sample-pagination') }}
        </div>
    </body>
</html>
