<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
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
            'store_name' => '喫茶みはる',
            'kana' => 'きっさみはる',
            'area' => '美浜町',
            'address' => '和歌山県日高郡美浜町111',
            'genre1' => 'モーニング',
            'genre2' => 'ランチ',
            'genre3' => 'カフェ',
            'regular_holiday' => '平日',
            'business_hours' => '8時〜17時',
            'phone_number' => '0765747554',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '2',
            'store_name' => 'カレー店山田',
            'kana' => 'かれーてんやまだ',
            'area' => '紀の川市',
            'address' => '和歌山県紀の川市333',
            'genre1' => 'ランチ',
            'regular_holiday' => '土日',
            'business_hours' => '11時〜14時（ラストオーダー13時）',
            'phone_number' => '0784844664',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => '森本屋',
            'kana' => 'もりもとや',
            'area' => '勝浦町',
            'address' => '和歌山県勝浦777',
            'genre1' => 'ランチ',
            'regular_holiday' => '年中無休',
            'business_hours' => '11時〜14時（ラストオーダー13時）',
            'phone_number' => '0784846574',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '3',
            'store_name' => 'パティシュリーcake',
            'kana' => 'ぱてぃしゅリーけーき',
            'area' => '和歌山市',
            'address' => '和歌山県和歌山市333',
            'genre1' => 'カフェ',
            'regular_holiday' => '土日',
            'business_hours' => '11時〜17時',
            'phone_number' => '0784444664',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '4',
            'store_name' => '花紋',
            'kana' => 'かもん',
            'area' => '御坊市',
            'address' => '和歌山県御坊薗567',
            'genre1' => 'ランチ',
            'genre1' => 'ディナー',
            'regular_holiday' => '水曜日',
            'business_hours' => '11時〜14時（ラストオーダー13時） 17
            時〜22時（ラストオーダー22時30分）',
            'phone_number' => '0785844664',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => 'バードマン',
            'kana' => 'ばーどまん',
            'area' => '御坊市',
            'address' => '和歌山県御坊市1',
            'genre1' => 'ランチ',
            'regular_holiday' => '年中無休',
            'business_hours' => '11時〜14時（ラストオーダー13時）',
            'phone_number' => '0784846474',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '5',
            'store_name' => '更科',
            'kana' => 'さらしな',
            'area' => '和歌山市',
            'address' => '和歌山県和歌山市363',
            'genre1' => 'ランチ',
            'genre1' => 'ディナー',
            'regular_holiday' => '日',
            'business_hours' => '11時〜21時',
            'phone_number' => '0784444664',
        ];
        DB::table('stores')->insert($param);
    }
    
}
