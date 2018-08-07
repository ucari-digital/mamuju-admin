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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('login', 'AuthController@login');

Route::get('berita', 'BeritaController@index');
Route::get('berita/draft', 'BeritaController@draft');

Route::get('kategori', 'KategoriController@index');
Route::post('kategori/save', 'KategoriController@save');
Route::get('kategori/edit/{id}', 'KategoriController@edit');
Route::post('kategori/update/{id}', 'KategoriController@update');
Route::get('kategori/delete/{id}', 'KategoriController@delete');

Route::get('administrator', 'AdministratorController@index');
Route::get('administrator/list', 'AdministratorController@list');

Route::get('pengguna', 'PenggunaController@index');
