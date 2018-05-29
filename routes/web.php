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
Route::get('readmore', 'HomeController@index')->name('home');
Route::get('{nss}/sekolah', 'HomeController@sekolah')->name('school');
Route::post('cari', 'HomeController@search')->name('cari');

Route::prefix('admin')->group(function () {
	Route::get('/', 'Auth\AdminController@adminform')->name('admin');
	Route::post('/', 'Auth\AdminController@adminTheme')->name('adminPost');
	
	Route::prefix('desa')->group(function () {	
		Route::post('add-desa', 'Auth\DesaController@addDesa')->name('addDesa');
		Route::post('edit-desa', 'Auth\DesaController@editDesa')->name('editDesa');
		Route::post('delete-desa', 'Auth\DesaController@deleteDesa')->name('deleteDesa');
			Route::get('/', 'Auth\DesaController@desa')->name('desa');
	});
	Route::prefix('kecamatan')->group(function () {	
		Route::post('add-kecamatan', 'Auth\KecamatanController@addKecamatan')->name('addKecamatan');
		Route::post('edit-kecamatan', 'Auth\KecamatanController@editKecamatan')->name('editKecamatan');
		Route::post('delete-kecamatan', 'Auth\KecamatanController@deleteKecamatan')->name('deleteKecamatan');
		Route::get('/', 'Auth\KecamatanController@kecamatan')->name('kecamatan');
	});
	Route::prefix('kabupaten')->group(function () {	
		Route::post('add-kabupaten', 'Auth\KabupatenController@addKabupaten')->name('addKabupaten');
		Route::post('edit-kabupaten', 'Auth\KabupatenController@editKabupaten')->name('editKabupaten');
		Route::post('delete-kabupaten', 'Auth\KabupatenController@deleteKabupaten')->name('deleteKabupaten');
		Route::get('/', 'Auth\KabupatenController@kabupaten')->name('kabupaten');
	});

	Route::prefix('provinsi')->group(function () {	
		Route::post('add-provinsi', 'Auth\ProvinsiController@addprovinsi')->name('addProvinsi');
		Route::post('edit-provinsi', 'Auth\ProvinsiController@editprovinsi')->name('editProvinsi');
		Route::post('delete-provinsi', 'Auth\ProvinsiController@deleteprovinsi')->name('deleteProvinsi');
		Route::get('/', 'Auth\ProvinsiController@provinsi')->name('provinsi');
	});

	Route::prefix('sekolah')->group(function () {	
		Route::post('add-sekolah', 'Auth\SekolahController@addSekolah')->name('addSekolah');
		Route::post('edit-sekolah', 'Auth\SekolahController@editSekolah')->name('editSekolah');
		Route::post('delete-sekolah', 'Auth\SekolahController@deleteSekolah')->name('deleteSekolah');
		Route::get('/', 'Auth\SekolahController@sekolah')->name('sekolah');

	});

	Route::prefix('fasilitas')->group(function () {	
		Route::post('add-fasilitas', 'Auth\FasilitasController@addFasilitas')->name('addFasilitas');
		Route::post('edit-fasilitas', 'Auth\FasilitasController@editFasilitas')->name('editFasilitas');
		Route::post('delete-fasilitas', 'Auth\FasilitasController@deleteFasilitas')->name('deleteFasilitas');
		Route::get('/', 'Auth\FasilitasController@fasilitas')->name('fasilitas');
	});

	Route::prefix('eskul')->group(function () {	
		Route::post('add-Eskul', 'Auth\EskulController@addEskul')->name('addEskul');
		Route::post('edit-Eskul', 'Auth\EskulController@editEskul')->name('editEskul');
		Route::post('delete-Eskul', 'Auth\EskulController@deleteEskul')->name('deleteEskul');
		Route::get('/', 'Auth\EskulController@eskul')->name('eskul');	
	});

	Route::prefix('prestasi')->group(function () {	
		Route::post('add-Prestasi', 'Auth\PrestasiController@addPrestasi')->name('addPrestasi');
		Route::post('edit-Prestasi', 'Auth\PrestasiController@editPrestasi')->name('editPrestasi');
		Route::post('delete-Prestasi', 'Auth\PrestasiController@deletePrestasi')->name('deletePrestasi');
		Route::get('/', 'Auth\PrestasiController@prestasi')->name('prestasi');
	});

	Route::prefix('jurusan')->group(function () {	
		Route::post('add-Jurusan', 'Auth\JurusanController@addJurusan')->name('addJurusan');
		Route::post('edit-Jurusan', 'Auth\JurusanController@editJurusan')->name('editJurusan');
		Route::post('delete-Jurusan', 'Auth\JurusanController@deleteJurusan')->name('deleteJurusan');
		Route::get('/', 'Auth\JurusanController@jurusan')->name('jurusan');
	});

	Route::prefix('kurikulum')->group(function () {	
		Route::post('add-Kurikulum', 'Auth\KurikulumController@addKurikulum')->name('addKurikulum');
		Route::post('edit-Kurikulum', 'Auth\KurikulumController@editKurikulum')->name('editKurikulum');
		Route::post('delete-Kurikulum', 'Auth\KurikulumController@deleteKurikulum')->name('deleteKurikulum');
		Route::get('/', 'Auth\KurikulumController@kurikulum')->name('kurikulum');
	});

	Route::prefix('galeri')->group(function () {	
		Route::post('add-galeri', 'Auth\GaleriController@addgaleri')->name('addGaleri');
		Route::post('edit-galeri', 'Auth\GaleriController@editgaleri')->name('editGaleri');
		Route::post('delete-galeri', 'Auth\GaleriController@deletegaleri')->name('deleteGaleri');
		Route::get('/', 'Auth\GaleriController@galeri')->name('galeri');
		Route::delete('/', 'Auth\GaleriController@destroy')->name('deleteMultiGaleri');
	});

	Route::prefix('guru')->group(function () {	
		Route::post('add-Guru', 'Auth\GuruController@addGuru')->name('addGuru');
		Route::post('edit-Guru', 'Auth\GuruController@editGuru')->name('editGuru');
		Route::post('delete-Guru', 'Auth\GuruController@deleteGuru')->name('deleteGuru');
		Route::get('/', 'Auth\GuruController@guru')->name('guru');
	});

	Route::prefix('siswa')->group(function () {	
		Route::post('add-Siswa', 'Auth\SiswaController@addSiswa')->name('addSiswa');
		Route::post('edit-Siswa', 'Auth\SiswaController@editSiswa')->name('editSiswa');
		Route::post('delete-Siswa', 'Auth\SiswaController@deleteSiswa')->name('deleteSiswa');
		Route::get('/', 'Auth\SiswaController@Siswa')->name('siswa');
	});
	Route::prefix('user')->group(function () {	
		Route::post('add-User', 'Auth\UsersController@addUser')->name('addUser');
		Route::post('edit-User', 'Auth\UsersController@editUser')->name('editUser');
		Route::post('delete-User', 'Auth\UsersController@deleteUser')->name('deleteUser');
		Route::get('/', 'Auth\UsersController@user')->name('user');
	});
});
