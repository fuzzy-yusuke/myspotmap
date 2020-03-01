@extends('layout')

    @section('content') <!--layout.blade.phpで設定した共通テンプレートを呼び出す-->
        <h1>登録スポット一覧</h1>

        <table class='table table-striped table-hover'>
            <tr>
                <th>カテゴリ</th><th>名前</th><th>住所</th>
            </tr>
        @foreach($places as $place)
            <tr>
                <td>{{$place->category->name}}</td>
                <td>
                    <a href={{ route('place.detail',['id'=>$place->$id]) }}>
                    {{$place->name}}
                    </a>
                </td>
                <td>{{$place->address}}</td>
            </tr>
        @endforeach
        </table>
    @endsection