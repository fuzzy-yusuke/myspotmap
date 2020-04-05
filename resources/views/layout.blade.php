<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='csrf-token' content='{{ csrf_token()}}'>
        <!--↑使い捨ての認証情報を自動で生成させる-->
        <link rel='stylesheet'href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <title>MySpotMap</title>
        <style>body {padding: 80px;}</style> <!--共通テンプレートを入れる為に、余白部分を広げる-->
        <script src='{{ asset("js/app.js")}}' defer></script> 
        <!--↑apps.jsを読み込むタイミングを遅らせる（Webページを読み込んだ後に読み込ませる）-->
    </head>
    <body>
        <!--ナビゲーションバーでオプションを記述-->
        <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
            <a class='navbar-brand' href="{{route('place.list')}}">myspotmap</a>
            <!--↓ナビゲーションバーに「ログイン」と「Register」のリンクを追加-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @if (Route::has('register'))
            <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            </li>
            @endguest
            </ul>
            </div>
            </div>
        </nav>
        <div class='container'> <!--実際の表示部分をレイアウトに適用させるクラス-->
        @yield('content')
         <!--個別のテンプレートの内容を当てはめて表示させる-->
        </div>
    </body>
</html>