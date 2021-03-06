@extends('layout')
<!--詳細ページの表示-->

    @section('content') 
    <!--layout.blade.phpで設定した共通テンプレートを呼び出す-->
        <h1>お気に入りスポットを登録する</h1>
        {{ Form::open([ 'route' => 'place.store'])}}
        <div class='form-group'>
            {{ Form::label('name','名前：' )}}
            {{ Form::text('name',null )}}
        </div>
        <div class='form-group'>
            {{ Form::label('address','住所：' )}}
            {{ Form::text('address',null )}}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id','ジャンル：' )}}
            {{ Form::text('category',null )}}
        </div>
        <div class='form-group'>
            {{ Form::submit('登録する',['class'=>'btn btn-outline-primary'] )}}
        </div>
        {{ Form::close()}}
        <div>
            <a href="{{ route('place.list') }}">一覧に戻る</a>
        </div>
    @endsection