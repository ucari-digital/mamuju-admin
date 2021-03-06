<?php

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

Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@login_action');
Route::get('logout', 'AuthController@logout');

Route::get('/', function (){
    return redirect('login');
});

Route::group(['middleware' => 'admin', 'prefix' => 'administrator'], function () {
    Route::get('/', 'DashboardController@index');

    Route::get('berita', 'BeritaController@index');
    Route::post('berita/save', 'BeritaController@save');
    Route::get('berita/draft', 'BeritaController@draft');
    Route::get('berita/list-berita', 'BeritaController@list');
    Route::get('berita/detail/{id}', 'BeritaController@detail');
    Route::get('berita/edit/{id}', 'BeritaController@edit');
    Route::post('berita/update/{id}', 'BeritaController@update');
    Route::get('berita/{id}/{status}', 'BeritaController@status');
    Route::get('berita/komentar/hapus/{id}', 'BeritaController@delete_komentar');

    Route::get('kategori', 'KategoriController@index');
    Route::post('kategori/save', 'KategoriController@save');
    Route::get('kategori/edit/{id}', 'KategoriController@edit');
    Route::post('kategori/update/{id}', 'KategoriController@update');
    Route::get('kategori/delete/{id}', 'KategoriController@delete');

	Route::get('administrator', 'AdministratorController@index');
	Route::get('administrator/list-akun', 'AdministratorController@list');
	Route::get('administrator/edit/{id}', 'AdministratorController@edit');
	Route::post('administrator/save', 'AdministratorController@save');
	Route::post('administrator/update/{id}', 'AdministratorController@update');
	Route::get('administrator/{mode}/{id?}', 'AdministratorController@status')
	->where(['mode' => 'delete|suspend']);

	Route::get('pengguna', 'PenggunaController@index');
	Route::get('pengguna/{mode}/{id?}', 'PenggunaController@status')
	->where(['mode' => 'active|suspend']);

    Route::get('statistik', 'StatistikController@index');

    Route::get('iklan', 'IklanController@index');
    Route::post('iklan/save', 'IklanController@save');
    Route::get('iklan/edit/{id}', 'IklanController@edit');
    Route::post('iklan/update/{id}', 'IklanController@update');
    Route::get('iklan/delete/{id}', 'IklanController@delete');
});

Route::group(['middleware' => 'writer', 'prefix' => 'writer'], function () {
    Route::get('/', 'DashboardController@index_writer');

    Route::get('berita', 'BeritaController@index_writer');
    Route::post('berita/save', 'BeritaController@save_writer');
    Route::get('berita/draft', 'BeritaController@draft_writer');
    Route::get('berita/list-berita', 'BeritaController@list_writer');

    Route::get('berita/detail/{id}', 'BeritaController@detail_writer');
    Route::get('berita/edit/{id}', 'BeritaController@edit_writer');
    Route::post('berita/update/{id}', 'BeritaController@update_writer');
});