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

Route::prefix('admin')->group(function () {
	Route::get('/', 'Auth\AdminController@adminform')->name('admin');
	Route::get('provinsi', 'Auth\ProvinsiController@provinsi')->name('provinsi');
	Route::get('kabupaten', 'Auth\KabupatenController@kabupaten')->name('kabupaten');
	Route::get('kecamatan', 'Auth\KecamatanController@kecamatan')->name('kecamatan');
	Route::get('desa', 'Auth\DesaController@desa')->name('desa');
	
	Route::prefix('desa')->group(function () {	
		Route::post('add-desa', 'Auth\DesaController@addDesa')->name('addDesa');
		Route::post('edit-desa', 'Auth\DesaController@editDesa')->name('editDesa');
		Route::post('delete-desa', 'Auth\DesaController@deleteDesa')->name('deleteDesa');
	});
	Route::prefix('kecamatan')->group(function () {	
		Route::post('add-kecamatan', 'Auth\KecamatanController@addKecamatan')->name('addKecamatan');
		Route::post('edit-kecamatan', 'Auth\KecamatanController@editKecamatan')->name('editKecamatan');
		Route::post('delete-kecamatan', 'Auth\KecamatanController@deleteKecamatan')->name('deleteKecamatan');
	});
	Route::prefix('kabupaten')->group(function () {	
		Route::post('add-kabupaten', 'Auth\KabupatenController@addKabupaten')->name('addKabupaten');
		Route::post('edit-kabupaten', 'Auth\KabupatenController@editKabupaten')->name('editKabupaten');
		Route::post('delete-kabupaten', 'Auth\KabupatenController@deleteKabupaten')->name('deleteKabupaten');
	});

	Route::prefix('provinsi')->group(function () {	
		Route::post('add-provinsi', 'Auth\provinsiController@addprovinsi')->name('addProvinsi');
		Route::post('edit-provinsi', 'Auth\provinsiController@editprovinsi')->name('editProvinsi');
		Route::post('delete-provinsi', 'Auth\provinsiController@deleteprovinsi')->name('deleteProvinsi');
	});

	Route::prefix('fasilitas')->group(function () {	
		Route::post('add-provinsi', 'Auth\provinsiController@addprovinsi')->name('addProvinsi');
		Route::post('edit-provinsi', 'Auth\provinsiController@editprovinsi')->name('editProvinsi');
		Route::post('delete-provinsi', 'Auth\provinsiController@deleteprovinsi')->name('deleteProvinsi');
	});


	Route::get('sekolah', 'Auth\AdminController@sekolah')->name('sekolah');
	Route::get('guru', 'Auth\AdminController@guru')->name('guru');
	Route::get('siswa', 'Auth\AdminController@siswa')->name('siswa');
	Route::get('prestasi', 'Auth\AdminController@prestasi')->name('prestasi');
	Route::get('jurusan', 'Auth\AdminController@jurusan')->name('jurusan');
	Route::get('kurikulum', 'Auth\AdminController@kurikulum')->name('kurikulum');
	Route::get('fasilitas', 'Auth\AdminController@fasilitas')->name('fasilitas');
	Route::get('eskul', 'Auth\AdminController@eskul')->name('eskul');
	Route::get('galeri', 'Auth\AdminController@galeri')->name('galeri');
});
