<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TwitterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/home', [SearchController::class, 'home'])->name("home");
Route::get('/index', [SearchController::class, 'index'])->name("index");
Route::post('/index', [SearchController::class, 'index'])->name("index"); //検索リセットボタン用
Route::get('/search', [SearchController::class, 'search'])->name("search");//検索後の、ページネーション時の検索結果の表示
Route::post('/search', [SearchController::class, 'search'])->name("search");
Route::get('/store', [StoreController::class, 'store'])->name("store");


Route::get('/contact', [ContactController::class, 'contact'])->name("contact");
Route::post('/contact/confirm', [ContactController::class, 'contact_confirm'])->name("contact.confirm");
Route::post('/contact/thanks', [ContactController::class, 'contact_send'])->name("contact.send");


Route::group(['middleware' => ['auth', 'can:system-only']], function () {
    Route::get('/contact/management', [ContactController::class, 'contact_management'])->name("contact.management");
    Route::post('/contact/management', [ContactController::class, 'contact_management'])->name("contact.management");
    Route::get('/contact/search', [ContactController::class, 'contact_search'])->name("contact.search");
    Route::post('/contact/search', [ContactController::class, 'contact_search'])->name("contact.search");
});




Route::get('/point', [PointController::class, 'point'])->name("point");







Route::group(['middleware' => ['auth']], function(){
    Route::get('/store/register/page', [StoreController::class, 'store_register_page'])->name("store.register.page");
    Route::post('/store/register', [StoreController::class, 'store_register'])->name("store.register");
    Route::get('/store/edit/page', [StoreController::class, 'store_edit_page'])->name("store.edit.page");
    Route::post('/store/edit', [StoreController::class, 'store_edit'])->name("store.edit");
    Route::get('/store/delete/page', [StoreController::class, 'store_delete_page'])->name("store.delete.page");
    Route::post('/store/delete', [StoreController::class, 'store_delete'])->name("store.delete");
    Route::get('/menu/register/page', [MenuController::class, 'menu_register_page'])->name("menu.register.page");
    Route::post('/menu/register', [MenuController::class, 'menu_register'])->name("menu.register");
    Route::get('/menu/edit/page', [MenuController::class, 'menu_edit_page'])->name("menu.edit.page");
    Route::post('/menu/edit', [MenuController::class, 'menu_edit'])->name("menu.edit");
    Route::get('/menu/delete/page', [MenuController::class, 'menu_delete_page'])->name("menu.delete.page");
    Route::post('/menu/delete', [MenuController::class, 'menu_delete'])->name("menu.delete");
});

Route::get('/login/twitter', [TwitterController::class, 'redirectToProvider'])->name("twitter.login");
Route::get('/login/twitter/callback',[TwitterController::class, 'handleProviderCallback']);
