<?php

Route::get('/myspots','PlaceController@index') -> name('place.list');
//一覧ページのルーティングを定義
//ドメインの最後が「myspots」の時、PlaceControllerを呼び出す

Route::get('/myspot/new','PlaceController@create') -> name('place.new');
//新規登録ページのルーティングを定義

Route::post('/myspot','PlaceController@store') -> name('place.store');
//登録内容を保存するルーティング定義
//引数が「new」にならないように、詳細ページの前に記述

Route::get('/myspot/edit/{id}','PlaceController@edit') -> name('place.edit');
//既存の登録データを編集するルーティング
//idを引数にし、idと紐づけられたデータを編集出来る

Route::post('/myspot/update/{id}','PlaceController@update') -> name('place.update');
//上記の編集した内容を保存する（更新する）ルーティング

Route::get('/myspot/{id}','PlaceController@show') -> name('place.detail');
//詳細ページへのルーティング
//idを引数にし、各スポットの詳細ページを呼び出す

Route::delete('/myspot/{id}','PlaceController@destroy') -> name('place.destroy');
//登録したスポットを削除するルーティング
//他のルーティングに影響が及ばないよう、一番最後に記述

Route::get('/', function () {
    return redirect('/myspots');
});

Auth::routes();

Route::get('/home', 'PlaceController@index')->name('place.list');