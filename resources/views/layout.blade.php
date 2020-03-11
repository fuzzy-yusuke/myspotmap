<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet'href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <title>MySpotMap</title>
        <style>body {padding: 80px;}</style> <!--共通テンプレートを入れる為に、余白部分を広げる-->
    </head>
    <body>
        <!--ナビゲーションバーでオプションを記述-->
        <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
            <a class='navbar-brand' href="{{route('place.list')}}">myspotmap</a>
        </nav>
        <div class='container'> <!--実際の表示部分をレイアウトに適用させるクラス-->
        @yield('content')
         <!--個別のテンプレートの内容を当てはめて表示させる-->
        </div>
    </body>
</html>