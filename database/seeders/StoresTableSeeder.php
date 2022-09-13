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
            'business_hours' => '17:00〜23:30',
            'store_phone_number' => '0765747554',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '2',
            'store_name' => 'カレー店山田',
            'kana' => 'かれーてんやまだ',
            'area' => '紀の川市',
            'store_address' => '和歌山県紀の川市333',
            'genre1' => 'ランチ',
            'regular_holiday' => '土曜・日曜',
            'business_hours' => '17:00〜23:30（ラストオーダー13:00）',
            'store_phone_number' => '0784844664',
            'outside_photo' => 'vUonxJjlheTgPPHGkZULB9qVkuoDnDRPCxUi1oKz.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'business_hours' => '17:00〜22:00',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '4',
            'store_name' => 'パティシュリーcake',
            'kana' => 'ぱてぃしゅリーけーき',
            'area' => '和歌山市',
            'store_address' => '和歌山県和歌山市333',
            'genre1' => 'カフェ',
            'business_hours' => '11:00〜17:30',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'business_hours' => '11:00〜14:00（ラストオーダー13:00） 17
            :00〜22:00（ラストオーダー22:00）',
            'store_phone_number' => '0785844664',
            'outside_photo' => 'vUonxJjlheTgPPHGkZULB9qVkuoDnDRPCxUi1oKz.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'regular_holiday' => '日曜日',
            'business_hours' => '11:00〜21:00',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
        ];
        DB::table('stores')->insert($param);
        $param = [
            'user_id' => '3',
            'store_name' => '山下cake',
            'kana' => 'やましたけーき',
            'area' => '由良町',
            'store_address' => '和歌山県由良町555',
            'genre1' => 'カフェ',
            'business_hours' => '9:00〜17:00',
            'store_phone_number' => '0784444564',
            'outside_photo' => 'vUonxJjlheTgPPHGkZULB9qVkuoDnDRPCxUi1oKz.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'business_hours' => '11:00〜14:00（ラストオーダー13:00） 17
            :00〜22:00（ラストオーダー22:00）',
            'store_phone_number' => '0782224664',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'outside_photo' => 'vUonxJjlheTgPPHGkZULB9qVkuoDnDRPCxUi1oKz.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'regular_holiday' => '日曜日',
            'business_hours' => '11:00〜21:00',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'outside_photo' => 'vUonxJjlheTgPPHGkZULB9qVkuoDnDRPCxUi1oKz.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
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
            'business_hours' => '11:00〜21:30',
            'store_phone_number' => '0784444664',
            'outside_photo' => 'vm7vnnNoSFrXolnA5gbSYo5P9aOhHRU19Jzv0UfO.jpg',
            'inside_photo' => 'BMUiy7bJJePFxzyqh2ojFLnX3N5ijmwy9JaKyOMa.jpg',
        ];
        DB::table('stores')->insert($param);
    }
    
}
