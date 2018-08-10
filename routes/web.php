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

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index');

    Route::get('berita', 'BeritaController@index');
    Route::post('berita/save', 'BeritaController@save');
    Route::get('berita/draft', 'BeritaController@draft');
    Route::get('berita/list-berita', 'BeritaController@list');
    Route::get('berita/detail/{id}', 'BeritaController@detail');
    Route::get('berita/edit/{id}', 'BeritaController@edit');
    Route::post('berita/update/{id}', 'BeritaController@update');
    Route::get('berita/{id}/{status}', 'BeritaController@status');

    Route::get('kategori', 'KategoriController@index');
    Route::post('kategori/save', 'KategoriController@save');
    Route::get('kategori/edit/{id}', 'KategoriController@edit');
    Route::post('kategori/update/{id}', 'KategoriController@update');
    Route::get('kategori/delete/{id}', 'KategoriController@delete');

	Route::get('administrator', 'AdministratorController@index');
	Route::get('administrator/list-akun', 'AdministratorController@list');
	Route::get('administrator/edit/{id}', 'AdministratorController@edit');
	Route::get('administrator/save', 'AdministratorController@save');
	Route::post('administrator/update/{id}', 'AdministratorController@update');
	Route::get('administrator/{mode}/{id?}', 'AdministratorController@status')
	->where(['mode' => 'delete|suspend']);

	Route::get('pengguna', 'PenggunaController@index');
	Route::get('pengguna/{mode}/{id?}', 'PenggunaController@status')
	->where(['mode' => 'active|suspend']);
});