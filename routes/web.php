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
Route::get('admin', 'HomeController@adminform')->name('admin');
Route::get('provinsi', 'HomeController@provinsi')->name('provinsi');
Route::get('kabupaten', 'HomeController@kabupaten')->name('kabupaten');
Route::get('kecamatan', 'HomeController@kecamatan')->name('kecamatan');
Route::get('desa', 'HomeController@desa')->name('desa');
Route::get('sekolah', 'HomeController@sekolah')->name('sekolah');
Route::get('guru', 'HomeController@guru')->name('guru');
Route::get('siswa', 'HomeController@siswa')->name('siswa');
Route::get('prestasi', 'HomeController@prestasi')->name('prestasi');
Route::get('jurusan', 'HomeController@jurusan')->name('jurusan');
Route::get('kurikulum', 'HomeController@kurikulum')->name('kurikulum');
Route::get('fasilitas', 'HomeController@fasilitas')->name('fasilitas');
Route::get('eskul', 'HomeController@eskul')->name('eskul');
Route::get('galeri', 'HomeController@galeri')->name('galeri');

