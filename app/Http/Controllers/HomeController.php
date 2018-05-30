<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sekolah;
use Provinsi;
use Kabupaten;
use Kecamatan;
use Desa;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['semuaprovinsi'] = Provinsi::all();
        $data['semuakabupaten'] = Kabupaten::all();
        $data['semuakecamatan'] = Kecamatan::all();
        $data['semuadesa'] = Desa::all();
        $data['sekolah'] = Sekolah::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('home')->with($data);
    }


    public function search(Request $request)
    {
        $search = $request->input('cari');
        $data['sekolahan'] = Sekolah::where('nama', 'LIKE', '%'.$search.'%')->orWhere('alamat', 'LIKE', '%'.$search.'%')->orWhere('kepala_sekolah', 'LIKE', '%'.$search.'%')->orWhere('nss', 'LIKE', '%'.$search.'%')->get();
        $data['cari'] = $request->input('cari');
        return view('cari')->with($data);
    }

    public function getStates($id) {
        $states = DB::table("kabupatens")->where("provinsi_id", '=',$id)->pluck("kabupaten","id");

        return json_encode($states);

    }

    public function sekolah($nss)
    {        
        $id = Sekolah::where('nss', '=', $nss)->value('id');
        $data['sekolah'] = Sekolah::find($id);
        return view('sekolah')->with($data);
    }

    public function ajaxRequestPost()
    {
        $input = request()->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
