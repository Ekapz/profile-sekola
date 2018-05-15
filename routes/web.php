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
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('admin', 'Auth\AdminController@adminform')->name('admin');
Route::get('provinsi', 'Auth\AdminController@provinsi')->name('provinsi');
Route::get('kabupaten', 'Auth\AdminController@kabupaten')->name('kabupaten');
Route::get('kecamatan', 'Auth\AdminController@kecamatan')->name('kecamatan');
Route::get('desa', 'Auth\AdminController@desa')->name('desa');
Route::post('add-desa', 'Auth\AdminController@addDesa')->name('addDesa');
Route::post('edit-desa', 'Auth\AdminController@editDesa')->name('editDesa');
Route::post('delete-desa', 'Auth\AdminController@deleteDesa')->name('deleteDesa');
Route::get('sekolah', 'Auth\AdminController@sekolah')->name('sekolah');
Route::get('guru', 'Auth\AdminController@guru')->name('guru');
Route::get('siswa', 'Auth\AdminController@siswa')->name('siswa');
Route::get('prestasi', 'Auth\AdminController@prestasi')->name('prestasi');
Route::get('jurusan', 'Auth\AdminController@jurusan')->name('jurusan');
Route::get('kurikulum', 'Auth\AdminController@kurikulum')->name('kurikulum');
Route::get('fasilitas', 'Auth\AdminController@fasilitas')->name('fasilitas');
Route::get('eskul', 'Auth\AdminController@eskul')->name('eskul');
Route::get('galeri', 'Auth\AdminController@galeri')->name('galeri');

