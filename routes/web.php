<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SitesController@index')->name('index');

/*
Route::resource('tasks', 'TasksController')->only([
  'index', 'store', 'edit', 'update', 'destroy'
]);
*/

Route::resource('sites', 'SitesController')->only([
  'index', 'store', 'edit', 'update', 'destroy', 'regist'
]);

// 登録画面に遷移
Route::get('/regist', 'SitesController@showRegistForm')->name('showRegistForm');
// 編集画面に遷移
Route::get('/regist/{id}', 'SitesController@showRegistForm')->name('showRegistForm');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// サイト関連
Route::get('/home', 'SitesController@index')->name('home');
Route::get('/sites', 'SitesController@index')->name('sites');





// その他