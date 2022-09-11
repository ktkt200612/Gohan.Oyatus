<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Storage;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(){ 
        return $this->belongsTo('App\Models\User');
    }
    public function menus(){
    return $this->hasMany('App\Models\Menu');
    }

    public static function searchStore1(Request $request) //検索関数
    {
        $result = Store::where('area', $request->area) 
        ->where(function($query) use ($request) {
            $query->where('genre1', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre2', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre3', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre4', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre5', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre6', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre7', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre8', 'LIKE', "%{$request->genre}%");
        })
        ->where(function($query) use ($request) {
            $query->where('store_name', 'LIKE', "%{$request->search_word}%")
        ->orWhereHas('menus', function($query) use ($request) {
            $query->where('search_word', 'LIKE', "%{$request->search_word}%")
        ->orWhere('menu_name', 'LIKE', "%{$request->search_word}%");
        });})
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore2(Request $request) //検索関数
    {
        $result = Store::where('area', $request->area) 
        ->where(function($query) use ($request) {
            $query->where('genre1', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre2', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre3', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre4', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre5', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre6', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre7', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre8', 'LIKE', "%{$request->genre}%");
        })
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore3(Request $request) //検索関数
    {
        $result = Store::where('area', $request->area) 
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore4(Request $request) //検索関数
    {
        $result = Store::where('area', $request->area) 
        ->where(function($query) use ($request) {
            $query->where('store_name', 'LIKE', "%{$request->search_word}%")
        ->orWhereHas('menus', function($query) use ($request) {
            $query->where('search_word', 'LIKE', "%{$request->search_word}%")
        ->orWhere('menu_name', 'LIKE', "%{$request->search_word}%");
        });})
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore5(Request $request) //検索関数
    {
        $result = Store::where(function($query) use ($request) {
            $query->where('store_name', 'LIKE', "%{$request->search_word}%")
        ->orWhereHas('menus', function($query) use ($request) {
            $query->where('search_word', 'LIKE', "%{$request->search_word}%")
        ->orWhere('menu_name', 'LIKE', "%{$request->search_word}%");
        });})
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore6(Request $request) //検索関数
    {
        $result = Store::where(function($query) use ($request) {
            $query->where('genre1', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre2', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre3', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre4', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre5', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre6', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre7', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre8', 'LIKE', "%{$request->genre}%");
        })
        ->where(function($query) use ($request) {
            $query->where('store_name', 'LIKE', "%{$request->search_word}%")
        ->orWhereHas('menus', function($query) use ($request) {
            $query->where('search_word', 'LIKE', "%{$request->search_word}%")->orWhere('menu_name', 'LIKE', "%{$request->search_word}%");
        });})
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function searchStore7(Request $request) //検索関数
    {
        $result = Store::where(function($query) use ($request) {
            $query->where('genre1', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre2', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre3', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre4', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre5', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre6', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre7', 'LIKE', "%{$request->genre}%")
                ->orWhere('genre8', 'LIKE', "%{$request->genre}%");
        })
        ->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }
        
    public static function searchStore8() //検索関数
    {
        $result = Store::first()->orderBy("kana","asc")
        ->paginate(5);
        return $result;
    }

    public static function registerStore(StoreRequest $request) //店舗登録関数
    {
        $form = $request->all()+ ['user_id' => Auth::id()];
        $outside_file = $request->file('outside_photo');
        $outside=Storage::disk('s3')->putFile('/', $outside_file,'public');
        $inside_file = $request->file('inside_photo');
        $inside=Storage::disk('s3')->putFile('/', $inside_file,'public');
        $store = Store::create([
            'outside_photo' => $outside,
            'inside_photo' => $inside,
        ]+$form);
        return $store;
    }

    public static function editStore1(StoreRequest $request) //店舗編集関数
    {
        unset($request['_token']);
        Store::find($request->id);
        $form = $request->all();
        $outside_file = $request->file('outside_photo');
        $outside=Storage::disk('s3')->putFile('/', $outside_file,'public');
        $inside_file = $request->file('inside_photo');
        $inside=Storage::disk('s3')->putFile('/', $inside_file,'public');
        Store::where('id',$request->id)->update([
        'outside_photo' => $outside,
        'inside_photo' => $inside,
        ]+$form);
    }

    public static function editStore2(StoreRequest $request) //店舗編集関数
    {
        unset($request['_token']);
        Store::find($request->id);
        $form = $request->all();
        $outside_file = $request->file('outside_photo');
        $outside=Storage::disk('s3')->putFile('/', $outside_file,'public');
        Store::where('id',$request->id)->update([
        'outside_photo' => $outside,
        ]+$form);
    }

    public static function editStore3(StoreRequest $request) //店舗編集関数
    {
        unset($request['_token']);
        Store::find($request->id);
        $form = $request->all();
        $inside_file = $request->file('inside_photo');
        $inside=Storage::disk('s3')->putFile('/', $inside_file,'public');
        Store::where('id',$request->id)->update([
        'inside_photo' => $inside,
        ]+$form);
    }

    public static function editStore4(StoreRequest $request) //店舗編集関数
    {
        unset($request['_token']);
        Store::find($request->id);
        $form = $request->all();
        Store::where('id',$request->id)->update($form);
    }
}
