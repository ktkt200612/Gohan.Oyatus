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
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '2',
            'menu_name' => 'スパイスカレー',
            'kana' => 'すぱいすかれー',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '1',
            'store_id' => '3',
            'menu_name' => 'スペシャル海鮮丼',
            'kana' => 'すぺしゃるかいせんどん',
            'limited' => 'マグロ、サーモン、いくら',
            'search_word' => '魚・海の幸',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '3',
            'store_id' => '4',
            'menu_name' => '桃のショートケーキ',
            'kana' => 'もものしょーとけーき',
            'limited' => '7月限定',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '3',
            'menu_name' => 'ビール',
            'kana' => 'びーる',
            'limited' => 'キリン',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '2',
            'store_id' => '3',
            'menu_name' => 'ビール',
            'kana' => 'びーる',
            'limited' => 'アサヒ',
        ];
        DB::table('menus')->insert($param);
        $param = [
            'user_id' => '3',
            'store_id' => '4',
            'menu_name' => 'つけ麺',
            'kana' => 'つけめん',
            'limited' => '数量限定',
            'search_word' => 'こってり',
        ];
        DB::table('menus')->insert($param);
    }
}
