@extends('layout')
<!--詳細ページの表示-->

    @section('content') 
    <!--layout.blade.phpで設定した共通テンプレートを呼び出す-->
        <h1>{{$place->name}}を編集する</h1>
        {{ Form::model($place,['route'=>['place.update',$place->id]])}}
        <div class='form-group'>
            {{ Form::label('name','名前：' )}}
            {{ Form::text('name',null )}}
        </div>
        <div class='form-group'>
            {{ Form::label('address','住所：' )}}
            {{ Form::text('address',null )}}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id','カテゴリ：' )}}
            {{ Form::text('category_id',$categories )}}
        </div>
        <div class='form-group'>
            {{ Form::submit('更新する',['class'=>'btn btn-outline-primary'] )}}
        </div>
        {{ Form::close()}}
        <div>
            <!--<a href={{ route(place.list) }}>一覧に戻る</a>-->
            {{HTML::link 'route(place.list','一覧に戻る')}}
        </div>
    @endsection