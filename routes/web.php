<?php

Route::get('/myspots','PlaceController@index')->name('place.list');
//一覧ページのルーティングを定義
//ドメインの最後が「myspots」の時、PlaceControllerを呼び出す

Route::get('/myspot/new','PlaceController@create')->name('place.new');
//新規登録ページのルーティングを定義

Route::post('/myspot','PlaceController@store')->name('place.store');
//登録内容を保存するルーティング定義
//引数が「new」にならないように、詳細ページの前に記述

Route::get('/myspot/{id}','PlaceController@show')->name('place.detail');
//詳細ページへのルーティング
//idを引数にし、各スポットの詳細ページを呼び出す

Route::get('/', function () {
    return redirect('/myspots');
});
