<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Site;
use Auth;
use Config;

class SitesController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $sites = Site::get();
        return view(
            'sites',
            [
                'sites' => $sites,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //バリデーション
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'url' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('index')
          ->withInput()
          ->withErrors($validator);
      }
      // Eloquentモデル
      $site = new Site;
      // $site->user_id = Auth::user()->id;
      $site->name = $request->name;
      $site->url = $request->url;
      $site->comment = $request->comment;
      $site->save();
      //「/」ルートにリダイレクト
      return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // サイトの登録画面の表示
    public function showRegistForm($id = null) {
        // idが渡って来た場合には編集

        // idが渡って来ない場合には新規登録
        $formInfos = array(
            'name' => array(
                'name' => 'サイト名',
                'type' => 'text'
            ),
            'company' => array(
                'name' => '運営者名',
                'type' => 'text'
            ),
            'url' => array(
                'name' => 'URL',
                'type' => 'text'
            ),
            'category' => array(
                'name' => 'カテゴリー',
                'type' => 'text'
            ),
            'comment' => array(
                'name' => 'コメント',
                'type' => 'text'
            )
        );

        // 設定ファイルからカテゴリーを取得
        $category = Config::get('app.category');

        return view(
            'regist',
            array(
                'formInfos' => $formInfos,
                'category'  => $category,
            )
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
