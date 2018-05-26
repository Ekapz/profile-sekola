<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Siswa;
use Sekolah;
use Jurusan;
use User;
use Session;
class SiswaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('admin');
    }

    public function siswa()
    {
    	$data['semuasekolah'] = Sekolah::all();
    	$data['semuajurusan'] = Jurusan::all();
        $data['murid'] = Siswa::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.siswa')->with($data);
    }

    public function addSiswa(Request $request)
    {
        $table = new Siswa;//daftarin table desa dengan variable modle
        $table->nis = $request->input('nis');//inputan table
        $table->nisn = $request->input('nisn');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_kelamin = $request->input('jenkel');//inputan table
        $table->tempat_lahir = $request->input('lahirdi');//inputan table
        $table->tanggal_lahir = $request->input('lahirtanggal');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->no_telp = $request->input('telp');//inputan table
        $table->email = $request->input('email');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->jurusan_id = $request->input('jurusan_id');//inputan table
        

        $table2 = new User;
        $table2->name = $request->input('nama');//inputan table2
        $table2->email = $request->input('email');//inputan table2
        $table2->password = bcrypt($request->input('nis'));//inputan table2
        $table2->role_id = 0;//inputan table2
        $table->save();//eksekusi data
        $table2->save();//eksekusi data
        Session::flash('message', "Siswa berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editSiswa(Request $request)
    {
        $table = Guru::find($request->input('id'));//manggil desa sesuai id
      	 $table->nis = $request->input('nis');//inputan table
        $table->nisn = $request->input('nisn');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_kelamin = $request->input('jenkel');//inputan table
        $table->tempat_lahir = $request->input('lahirdi');//inputan table
        $table->tanggal_lahir = $request->input('lahirtanggal');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->no_telp = $request->input('telp');//inputan table
        $table->email = $request->input('email');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->jurusan_id = $request->input('jurusan_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Siswa berhasil diedit.");
        return back();
    }

    public function deleteSiswa(Request $request)
    {
    	$table = Guru::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Siswa berhasil dihapus.");
        return back();
    }
}
