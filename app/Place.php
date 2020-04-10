<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
        //Categoryモデルと関連付けさせる。（Categoryモデルに属させるイメージ）
    } 
        //Placeモデルにリレーションを設定

    public function user(){
        return $this->belongsTo('App\User');
    }
}
