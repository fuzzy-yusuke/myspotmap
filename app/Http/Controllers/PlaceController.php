<?php

namespace App\Http\Controllers;

use App\Place;
use App\Category; //Category.phpファイルを使う
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct()
    {
        //ログインしていない時、実行しない機能を指定するメソッド
        $this->middleware('auth')->except(['index','show']);
        //一覧表示と詳細表示以外の機能を指定
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧を呼び出す為のメソッド
            $places=Place::all();
            return view('index',['places' => $places]);
            //DBにある全てのデータを呼び出す
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新規登録のメソッド
        $place=new Place;
        $categories=Category::all()->pluck('name','id');
        //pluckメソッドで「name」と「id」を指定し、取り出す
        return view('new',['place'=>$place,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //登録内容を保存するメソッド
        $place = new Place;
        $place->name=request('name');
        $place->address=request('address');
        $place->category_id=request('category_id');
        $place -> save();
        return redirect()->route('place.detail',['id'=>$place->id]);
        //登録後、詳細ページへ移動
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //詳細ページを呼び出すメソッド
        //idを引数に設定する
        $place= Place::find($id);
        return view('show',['place'=>$place]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //更新ページを呼び出すメソッド
        $place=Place::find($id);
        $categories=Category::all()->pluck('name','id');
        //pluckメソッドで「name」と「id」を指定し、取り出す
        return view('edit',['place'=>$place,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, Place $place)
    {
        //更新画面で編集した内容を保存するメソッド
        $place=Place::find($id);
        $place->name=request('name');
        $place->address=request('address');
        $place->category_id=request('category_id');
        $place->save();
        return redirect()->route('place.detail',['id'=>$place->id]);
        //保存出来たら、詳細ページに戻る
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //登録した内容を削除するメソッド
        $place=Place::find($id);
        $place->delete();
        return redirect('/myspots');
    }
}
