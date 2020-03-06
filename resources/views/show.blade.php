@extends('layout')
<!--詳細ページの表示-->

    @section('content') 
    <!--layout.blade.phpで設定した共通テンプレートを呼び出す-->
        <h1>{{$place->name}}</h1>
        <div>
            <p>{{$place->category->name}}</p>
            <p>{{$place->address}}</p>
        </div>
        <div>
            <a href={{ route(place.list) }}>一覧に戻る</a>
            <a href={{ route(place.edit,[id=>$place->id])}}>編集</a>
        </div>
    @endsection