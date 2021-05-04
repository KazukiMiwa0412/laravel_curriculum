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
        <h1>検索</h1>
         
        <form action="{{url('/books')}}" method="GET">
            <p><input type="text" name="keyword" value="{{$keyword}}"></p>
            <p><input type="number" name="stock" value="{{$stock}}">以上</p>
            <p><input type="submit" value="検索"></p>
        </form>
         
        @if($books->count())
         
        <table border="1">
            <tr>
                <th>title</th>
                <th>author</th>
                <th>stock</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->stock }}</td>
            </tr>
            @endforeach
        </table>
         
        @else
        <p>見つかりませんでした。</p>
        @endif
    </body>
</html>

