<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function store_register_page() //店舗登録ページ表示
    {
        return view('store_register');
    }

    public function store_register(StoreRequest $request) //店舗登録
    {   
        unset($request['_token']);
        $store= Store::registerStore($request); 
        $form=Store::where('id',$store->id)->first();
        $items=Menu::where('store_id',$store->id)->orderBy("kana","asc")->get();
        $request->session()->regenerateToken();
        return view('store' ,['form'=> $form,'items'=> $items]);
    }
    

    public function store(Request $request) //店舗詳細ページ表示
    {
        unset($request['_token']);
        $form=Store::where('id',$request->id)->first();
        $items=Menu::where('store_id',$request->id)->orderBy("kana","asc")->get();
        return view('store' ,['form'=> $form,'items'=> $items]);
    }

    public function store_edit_page(Request $request) //店舗編集ページ表示
    {
        unset($request['_token']);
        $form=Store::where('id',$request->id)->first();
        return view('store_edit',['form'=> $form]);
    }

    public function store_edit(StoreRequest $request) //店舗編集
    {
        // 外観写真も内観写真も更新する時
        if ($request->outside_photo !== null && $request->inside_photo !== null) { 
            Store::editStore1($request); 

        // 外観写真のみ更新する時
        } elseif ($request->outside_photo !== null && $request->inside_photo == null) { 
            Store::editStore2($request); 
            
        // 内観写真のみ更新する時
        } elseif ($request->outside_photo == null && $request->inside_photo !== null) { 
            Store::editStore3($request); 
            
        // 写真の変更がない時
        } else {
            Store::editStore4($request); 
        }

        $form=Store::where('id',$request->id)->first();
        $items=Menu::where('store_id',$request->id)->orderBy("kana","asc")->get();
        
        return view('store' ,['form'=> $form,'items'=> $items]);
    }

    public function store_delete_page(Request $request) //店舗削除ページ表示
    {
        unset($request['_token']);
        $item=Store::where('id',$request->id)->first();
        return view('store_delete',['item'=> $item]);
    }

    public function store_delete(Request $request) //店舗削除
    {

        if ($request->get('action') === 'back') {
            unset($request['_token']);
            $form=Store::where('id',$request->id)->first();
            return view('store_edit',['form'=> $form]);
        }
        Store::find($request->id)->delete();
        return redirect('/index');
    }
}
