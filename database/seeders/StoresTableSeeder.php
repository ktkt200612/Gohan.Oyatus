<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $outside = file_get_contents('public/storage/img/outside1.jpg');
        $outside = base64_encode($outside);
        $inside = file_get_contents('public/storage/img/inside2.jpg');
        $inside = base64_encode($inside);


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
            'outside_photo' => $outside,
            'inside_photo' => $inside,
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
            'outside_photo' => $outside,
            'inside_photo' => $inside,
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
            'outside_photo' => $outside,
            'inside_photo' => $inside,
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
            'outside_photo' => $outside,
            'inside_photo' => $inside,
        ];
        
    }
    
}
