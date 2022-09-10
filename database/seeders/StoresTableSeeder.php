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
            'store_address' => '和歌山県日高郡美浜町111',
            'genre1' => 'モーニング',
            'genre2' => 'ランチ',
            'genre3' => 'カフェ',
            'regular_holiday' => '平日',
            'business_hours' => '8時〜17時',
            'store_phone_number' => '0765747554',
            'outside_photo' => 'img/outside1.jpg',
            'inside_photo' => 'img/inside2.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '2',
            'store_name' => 'カレー店山田',
            'kana' => 'かれーてんやまだ',
            'area' => '紀の川市',
            'store_address' => '和歌山県紀の川市333',
            'genre1' => 'ランチ',
            'regular_holiday' => '土日',
            'business_hours' => '11時〜14時（ラストオーダー13時）',
            'store_phone_number' => '0784844664',
            'outside_photo' => 'img/outside2.jpg',
            'inside_photo' => 'img/inside1.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '3',
            'store_name' => '森本屋',
            'kana' => 'もりもとや',
            'area' => '那智勝浦町',
            'store_address' => '和歌山県町勝浦町777',
            'genre1' => 'ランチ',
            'regular_holiday' => '年中無休',
            'business_hours' => '11時〜14時（ラストオーダー13時）',
            'outside_photo' => 'img/outside1.jpg',
            'inside_photo' => 'img/inside1.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '4',
            'store_name' => 'パティシュリーcake',
            'kana' => 'ぱてぃしゅリーけーき',
            'area' => '和歌山市',
            'store_address' => '和歌山県和歌山市333',
            'genre1' => 'カフェ',
            'business_hours' => '11時〜17時',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'img/outside1.jpg',
            'inside_photo' => 'img/inside4.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '4',
            'store_name' => '花紋',
            'kana' => 'かもん',
            'area' => '御坊市',
            'store_address' => '和歌山県御坊薗567',
            'genre1' => 'ランチ',
            'genre2' => 'ディナー',
            'regular_holiday' => '水曜日',
            'business_hours' => '11時〜14時（ラストオーダー13時） 17
            時〜22時（ラストオーダー22時30分）',
            'store_phone_number' => '0785844664',
            'outside_photo' => 'img/outside2.jpg',
            'inside_photo' => 'img/inside2.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => 'バードマン',
            'kana' => 'ばーどまん',
            'area' => '御坊市',
            'store_address' => '和歌山県御坊市1',
            'genre1' => 'ランチ',
            'regular_holiday' => '年中無休',
            'store_phone_number' => '0784846474',
            'outside_photo' => 'img/outside4.jpg',
            'inside_photo' => 'img/inside1.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '2',
            'store_name' => '更科',
            'kana' => 'さらしな',
            'area' => '和歌山市',
            'store_address' => '和歌山県和歌山市363',
            'genre1' => 'ランチ',
            'genre2' => 'ディナー',
            'regular_holiday' => '日',
            'business_hours' => '11時〜21時',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'img/outside3.jpg',
            'inside_photo' => 'img/inside2.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '3',
            'store_name' => '山下cake',
            'kana' => 'やましたけーき',
            'area' => '由良町',
            'store_address' => '和歌山県由良町555',
            'genre1' => 'カフェ',
            'business_hours' => '9時〜17時',
            'store_phone_number' => '0784444564',
            'outside_photo' => 'img/outside2.jpg',
            'inside_photo' => 'img/inside4.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => 'ビートル',
            'kana' => 'びーとる',
            'area' => '田辺市',
            'store_address' => '和歌山県田辺市000',
            'genre1' => '夜カフェ',
            'genre2' => 'カフェ',
            'regular_holiday' => '水曜日',
            'business_hours' => '13時〜16時（ラストオーダー15時） 17
            時〜22時（ラストオーダー22時30分）',
            'store_phone_number' => '0782224664',
            'outside_photo' => 'img/outside3.jpg',
            'inside_photo' => 'img/inside3.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => '北海',
            'kana' => 'ほっかい',
            'area' => '御坊市',
            'store_address' => '和歌山県御坊市121',
            'genre1' => 'ランチ',
            'regular_holiday' => '年中無休',
            'store_phone_number' => '0784846474',
            'outside_photo' => 'img/outside3.jpg',
            'inside_photo' => 'img/inside3.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => 'おむすびスタンドくど',
            'kana' => 'おむすびすたんどくど',
            'area' => '九度山町',
            'store_address' => '和歌山県九度山町363',
            'genre1' => 'ランチ',
            'genre2' => 'ディナー',
            'regular_holiday' => '日',
            'business_hours' => '11時〜21時',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'img/outside2.jpg',
            'inside_photo' => 'img/inside3.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '1',
            'store_name' => 'ペスカトーレ',
            'kana' => 'ぺすかとーれ',
            'area' => '白浜町',
            'store_address' => '和歌山県白浜町555',
            'genre1' => 'ランチ',
            'regular_holiday' => '年末年始',
            'store_phone_number' => '0784446474',
            'outside_photo' => 'img/outside3.jpg',
            'inside_photo' => 'img/inside3.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '2',
            'store_name' => '喜多',
            'kana' => 'きた',
            'area' => '御坊市',
            'store_address' => '和歌山県御坊市1111-11',
            'genre1' => 'ランチ',
            'genre2' => 'ディナー',
            'regular_holiday' => '不定休',
            'business_hours' => '11時〜21時',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'img/outside3.jpg',
            'inside_photo' => 'img/inside3.jpg',
        ];
        DB::table('stores')->insert($param);
    }
    
}
