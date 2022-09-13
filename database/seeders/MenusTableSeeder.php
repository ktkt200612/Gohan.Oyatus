<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'store_id' => '1',
            'menu_name' => 'サンドウィッチ',
            'kana' => 'さんどうぃっち',
            'search_word' => 'サンドイッチ・パン',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '2',
            'menu_name' => 'スパイスカレー',
            'kana' => 'すぱいすかれー',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '3',
            'menu_name' => 'スペシャル海鮮丼',
            'kana' => 'すぺしゃるかいせんどん',
            'limited' => '土曜限定',
            'search_word' => '魚・海の幸',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '4',
            'menu_name' => '桃のショートケーキ',
            'kana' => 'もものしょーとけーき',
            'limited' => '7月限定',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '5',
            'menu_name' => 'ビール',
            'kana' => 'びーる',
            'search_word' => 'キリン',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '6',
            'menu_name' => 'ビール',
            'kana' => 'びーる',
            'search_word' => 'アサヒ・酒',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '8',
            'menu_name' => 'つけ麺',
            'kana' => 'つけめん',
            'limited' => '数量限定',
            'search_word' => 'こってり',
            'photo' => 'LuaqEsYgyQ2XnJDVRut0YZhoNBb0Pc2jcyyXt0IS.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '1',
            'menu_name' => '醤油ラーメン',
            'kana' => 'しょうゆらーめん',
            'limited' => '1日10食限定',
            'search_word' => 'こってり・湯浅醤油',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '2',
            'menu_name' => '刺身定食',
            'kana' => 'さしみていしょく',
            'search_word' => 'マグロ・アジ',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '3',
            'menu_name' => 'カツ丼',
            'kana' => 'かつどん',
            'limited' => '平日限定・5月限定 ',
            'search_word' => '豚・揚げ物',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '4',
            'menu_name' => '梅おにぎり',
            'kana' => 'うめおにぎり',
            'search_word' => 'こめ・米',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '5',
            'menu_name' => 'ブラックつけ麺',
            'kana' => 'ぶらっくつけめん',
            'limited' => '数量限定',
            'search_word' => 'あっさり',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '6',
            'menu_name' => 'チーズケーキ',
            'kana' => 'ちーずけーき',
            'search_word' => '甘い・おやつ',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '7',
            'menu_name' => 'プリンアラモード',
            'kana' => 'ぷりんあらもーど',
            'limited' => '1日10食限定',
            'search_word' => '昔ながら',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '8',
            'menu_name' => 'プリンアラモード',
            'kana' => 'ぷりんあらもーど',
            'limited' => '1日10食限定',
            'search_word' => '昔ながら',
            'photo' => 'Y3RMFs2DYflRHfgfEfNm7InZj5279IgLlCz0rdDI.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '3',
            'store_id' => '1',
            'menu_name' => '桃のタルト',
            'kana' => 'もものたると',
            'limited' => '夏季限定',
            'search_word' => '甘い・おやつ',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '4',
            'store_id' => '1',
            'menu_name' => 'つけ麺',
            'kana' => 'つけめん',
            'limited' => '数量限定',
            'search_word' => 'こってり',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '5',
            'store_id' => '2',
            'menu_name' => 'てっさ',
            'kana' => 'てっさ',
            'search_word' => 'ふぐ',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '6',
            'store_id' => '2',
            'menu_name' => 'ももの焼き鳥',
            'kana' => 'もものやきとり',
            'search_word' => '地鶏',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '3',
            'store_id' => '11',
            'menu_name' => '味噌餃子',
            'kana' => 'みそぎょうざ',
            'search_word' => '中華',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '5',
            'store_id' => '10',
            'menu_name' => 'ナポリタン',
            'kana' => 'なぽりたん',
            'search_word' => 'パスタ・ケチャップ',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '6',
            'store_id' => '9',
            'menu_name' => 'こころの焼き鳥',
            'kana' => 'こころのやきとり',
            'search_word' => '地鶏',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);



        $param = [
            'user_id' => '5',
            'store_id' => '1',
            'menu_name' => 'てっさ',
            'kana' => 'てっさ',
            'search_word' => 'ふぐ',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '6',
            'store_id' => '3',
            'menu_name' => 'ももの焼き鳥',
            'kana' => 'もものやきとり',
            'search_word' => '地鶏',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '3',
            'store_id' => '5',
            'menu_name' => '味噌餃子',
            'kana' => 'みそぎょうざ',
            'search_word' => '中華',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '5',
            'store_id' => '1',
            'menu_name' => 'ナポリタン',
            'kana' => 'なぽりたん',
            'search_word' => 'パスタ・ケチャップ',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '6',
            'store_id' => '5',
            'menu_name' => 'こころの焼き鳥',
            'kana' => 'こころのやきとり',
            'search_word' => '地鶏',
            'photo' => 'FEg9xSX3u3lwEFgcBFnWfVOaziE4n9TErB1ojvNz.jpg',
        ];
        DB::table('menus')->insert($param);
    }
}
