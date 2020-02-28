<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>
        <title>MySpotMap</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>登録スポット一覧</h1>

        @foreach($places as $place)
            <p>
                {{$place->category->name}},
                {{$place->name}},
                {{$place->address}}
            </p>
        @endforeach
    </body>
</html>