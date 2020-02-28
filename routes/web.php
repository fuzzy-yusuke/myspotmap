<?php

Route::get('/myspots','PlaceController@index')->name('place.list');
//一覧ページのルーティングを定義
//ドメインの最後が「myspots」の時、PlaceControllerを呼び出す

Route::get('/', function () {
    return redirect('/myspots');
});
