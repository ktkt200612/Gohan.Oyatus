<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Store;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    public function menu_register_page(Request $request) //メニュー登録ページ表示
    {
        $store_id = $request->id;
        return view('menu_register',[
            'store_id' => $store_id,
        ]);
    }

    public function menu_register(MenuRequest $request) //メニュー登録
    {   
        unset($request['_token']);
        $form = $request->all()+ ['user_id' => Auth::id()];
        $file = $request->file('photo');
        $photo=Storage::disk('s3')->putFile('/', $file,'public');
        $menu = Menu::create([
            'photo' => $photo,
        ]+$form);

        $form=Store::where('id',$menu->store_id)->first();
        $items=Menu::where('store_id',$menu->store_id)->orderBy("kana","asc")->get();
        $request->session()->regenerateToken();
        
        return view('store' ,['form'=> $form,'items'=> $items]);
    }

    public function menu_edit_page(Request $request) //メニュー編集ページ表示
    {
        unset($request['_token']);
        $form=Menu::where('id',$request->id)->first();
        return view('menu_edit',['form'=> $form]);
    }

    public function menu_edit(MenuRequest $request) //メニュー編集
    {
        unset($request['_token']);
        $menu = Menu::find($request->id);
        $form = $request->all();

        // 写真も更新する時
        if ($request->file('photo') !== null) { 
            $file = $request->file('photo');
            $photo=Storage::disk('s3')->putFile('/', $file,'public');
            Menu::where('id',$request->id)->update([
            'photo' => $photo,
        ]+$form);

        // 写真の変更がない時
        } else {
            Menu::where('id',$request->id)->update($form);
        }

        $form=Store::where('id',$menu->store_id)->first();
        $items=Menu::where('store_id',$menu->store_id)->orderBy("kana","asc")->get();
        
        return view('store' ,['form'=> $form,'items'=> $items]);
    }


    public function menu_delete_page(Request $request) //メニュー削除ページ表示
    {
        unset($request['_token']);
        $item=Menu::where('id',$request->id)->first();
        return view('menu_delete',['item'=> $item]);
    }

    public function menu_delete(Request $request) //メニュー削除
    {
        if ($request->get('action') === 'back') {
            unset($request['_token']);
            $form=Menu::where('id',$request->id)->first();
            return view('menu_edit',['form'=> $form]);
        }
        unset($request['_token']);
        $menu = Menu::find($request->id);
        $form=Store::where('id',$menu->store_id)->first();
        Menu::find($request->id)->delete();
        $items=Menu::where('store_id',$form->id)->orderBy("kana","asc")->get();
        return view('store',['form'=> $form,'items'=> $items]);
    }   
}
