<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;




class SearchController extends Controller
{
    public function home() //ホームページ表示
    {
        return view('home');
    }

    public function index() //検索ページ及び検索結果ページ表示
    {
        $result = Store::orderBy("kana","asc")->paginate(10);
        return view('index', ['forms' => $result]);
    }

    public function search(Request $request) //検索処理
    {
        unset($request['_token']);
        if ($request->area !== null && $request->genre !== null && $request->search_word !== null) { //全ての検索欄が埋まっている場合
            $result = Store::searchStore1($request);
            $keyword = $request->only(['area','genre','search_word']); //検索後の検索欄に検索履歴残す
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area !== null && $request->genre !== null && $request->search_word == null) { 
            $result = Store::searchStore2($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area !== null && $request->genre == null && $request->search_word == null) { 
            $result = Store::searchStore3($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area !== null && $request->genre == null && $request->search_word !== null) {
            $result = Store::searchStore4($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area == null && $request->genre == null && $request->search_word !== null) {
            $result = Store::searchStore5($request);
            $keyword = $request->only(['area','genre','search_word']);
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area == null && $request->genre !== null && $request->search_word !== null) {
            $result = Store::searchStore6($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);

        } elseif ($request->area == null && $request->genre !== null && $request->search_word == null) {
            $result = Store::searchStore7($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);
            
        } else {
            $result = Store::searchStore8($request);
            $keyword = $request->only(['area','genre','search_word']); 
            return view('index', ['forms' => $result,'keyword' => $keyword]);
        }
    }

}
