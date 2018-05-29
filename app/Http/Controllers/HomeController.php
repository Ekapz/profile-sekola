<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sekolah;
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
        $data['sekolah'] = Sekolah::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('home')->with($data);
    }

     public function readmore($id)
    {
        $data['sekolah'] = Sekolah::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('readmore')->with($data);
    }

    public function search(Request $request)
    {
        $data['sekolahan'] = Sekolah::where('nama', '=', $request->input('cari'))->get();
        $data['cari'] = $request->input('cari');
        return view('cari')->with($data);
    }

    public function ajaxRequestPost()
    {
        $input = request()->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
