@extends('layout')
<!--詳細ページの表示-->

    @section('content') 
    <!--layout.blade.phpで設定した共通テンプレートを呼び出す-->
        <h1>{{$place->name}}</h1>
        <div>
            <p>{{$place->category}}</p>
            <p>{{$place->address}}</p>
        </div>

        <iframe id='map' src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAm6D4vHCLMs5RVXUU10qSNQmMfXVV2DCs&q={{$place->address}}"
            width='100%'
            height='320'
            frameborder='0'>
        </iframe>
        <div>
            <a href="{{ route('place.list') }}" class='btn btn-outline-info'>一覧に戻る</a>
            @auth
                    <!--↓投稿がログインしているユーザーのIDだった場合、編集リンクを表示-->
                    @if($place->user_id===$login_user_id)
                    <a href="{{ route('place.edit',['id' => $place -> id])}}" class='btn btn-outline-warning'>編集</a>
                    <p></p>
                    {{ Form::open(['method'=>'delete','route'=>['place.destroy',$place->id]])}}
                    {{ Form::submit('削除')}}
                {{ Form::close()}}
                    @endif
            @endauth
        </div> 
    @endsection