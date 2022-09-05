<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Str;

class PointController extends Controller
{
    public function point() //ポイントランキングページ表示
    {
        if (Auth::check()) {
            $user= Auth::user();

            // 各ユーザーのパターン別store登録数
            $store1=Store::where('user_id',$user->id)->where('regular_holiday', '!=', '')->where('business_hours', '!=', '')->where('phone_number', '!=', '')->count(); //1700p
            $store2=Store::where('user_id',$user->id)->where('regular_holiday', '!=', ' ')->where('business_hours', '!=', ' ')->where('phone_number', '=', ' ')->count(); //1600p
            $store3=Store::where('user_id',$user->id)->where('regular_holiday', '!=', '')->where('business_hours', '=', '')->where('phone_number', '=', '')->count(); //1300p
            $store4=Store::where('user_id',$user->id)->where('regular_holiday', '=', '')->where('business_hours', '=', '')->where('phone_number', '!=', '')->count(); //1100p
            $store5=Store::where('user_id',$user->id)->where('regular_holiday', '=', '')->where('business_hours', '!=', '')->where('phone_number', '!=', '')->count(); //1400p
            $store6=Store::where('user_id',$user->id)->where('regular_holiday', '!=', '')->where('business_hours', '=', '')->where('phone_number', '!=', '')->count(); //1400p
            $store7=Store::where('user_id',$user->id)->where('regular_holiday', '=', '')->where('business_hours', '!=', '')->where('phone_number', '=', '')->count(); //1300p
            $store8=Store::where('user_id',$user->id)->where('regular_holiday', '=', '')->where('business_hours', '=', '')->where('phone_number', '=', '')->count(); //1100p


            // 各ユーザーのパターン別menu登録
            $menu1=Menu::where('user_id',$user->id)->where('limited', '!=', '')->where('search_word', '!=', '')->get(); //700p
            $menu2=Menu::where('user_id',$user->id)->where('limited', '=', '')->where('search_word', '!=', '')->get(); //650p
            $menu3=Menu::where('user_id',$user->id)->where('limited', '=', '')->where('search_word', '=', '')->get(); //600p
            $menu4=Menu::where('user_id',$user->id)->where('limited', '!=', '')->where('search_word', '=', '')->get(); //650p

            // $menu1時のsearch_wordの文字数 //1文字につき50p
            if (!empty($menus1)) {
                foreach ($menu1 as $menu) {
                    $menus1[] = Str::length($menu->search_word);
                }
                $search_word1 = array_sum($menus1);
            }

            // $menu2時のsearch_wordの文字数　//1文字につき50p
            if (!empty($menus2)) {
                foreach ($menu2 as $menu) {
                $menus2[] = Str::length($menu->search_word);
                }
                $search_word2 = array_sum($menus2);
            }
        

            // search_wordに登録文字あるか否かで最終ポイントを計算
            if (!empty($search_word1) && !empty($search_word2)) {
                User::where('id',$user->id)->update([
                    'point' => $store1*1700+$store2*1600+$store3*1300+$store4*1100+$store5*1400+$store6*1400+$store7*1300+$store8*1000+$search_word1*50+$menu1->count()*700+$search_word2*50+$menu2->count()*650+$menu3->count()*600+$menu4->count()*650,'store_quantity' => $store1+$store2+$store3+$store4+$store5+$store6+$store7+$store8,'menu_quantity' => $menu1->count()+$menu2->count()+$menu3->count()+$menu4->count(),
                ]);
            }else if(!empty($search_word1) && empty($search_word2)) {
                User::where('id',$user->id)->update([
                    'point' => $store1*1700+$store2*1600+$store3*1300+$store4*1100+$store5*1400+$store6*1400+$store7*1300+$store8*1000+$search_word1*50+$menu1->count()*700+$menu2->count()*650+$menu3->count()*600+$menu4->count()*650,'store_quantity' => $store1+$store2+$store3+$store4+$store5+$store6+$store7+$store8,'menu_quantity' => $menu1->count()+$menu2->count()+$menu3->count()+$menu4->count(),
                ]);
            }else if(empty($search_word1) && !empty($search_word2)) {
                User::where('id',$user->id)->update([
                    'point' => $store1*1700+$store2*1600+$store3*1300+$store4*1100+$store5*1400+$store6*1400+$store7*1300+$store8*1000+$menu1->count()*700+$search_word2*50+$menu2->count()*650+$menu3->count()*600+$menu4->count()*650,'store_quantity' => $store1+$store2+$store3+$store4+$store5+$store6+$store7+$store8,'menu_quantity' => $menu1->count()+$menu2->count()+$menu3->count()+$menu4->count(),
                ]);
            }else{
                User::where('id',$user->id)->update([
                'point' => $store1*1700+$store2*1600+$store3*1300+$store4*1100+$store5*1400+$store6*1400+$store7*1300+$store8*1000+$menu1->count()*700+$menu2->count()*650+$menu3->count()*600+$menu4->count()*650,'store_quantity' => $store1+$store2+$store3+$store4+$store5+$store6+$store7+$store8,'menu_quantity' => $menu1->count()+$menu2->count()+$menu3->count()+$menu4->count(),
                ]);
            }


        $items = User::all()->sortByDesc("point");
        return view('point', ['items'=>$items]);

        }else{
        $items = User::all()->sortByDesc("point");
        return view('point', ['items'=>$items]);
        }
    }
}
