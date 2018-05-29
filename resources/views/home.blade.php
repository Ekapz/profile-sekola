@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cari Sekolah</div>
                <div class="panel-body">
                    <form action="{{ route('cari') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control input-lg" name="cari" placeholder="Cari Sekolah">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-lg" type="submit">Cari <i class="fa fa-search fa-fw"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-now justify-content-center">
        @foreach($sekolah as $r)
        <div class="panel panel-now panel-default">
            <div class="panel-heading text-center"><b>{{ $r->nama }}</b></div>
            <img src="{{ asset('uploads/'.$r->image) }}" class="img-responsive">
            <div class="panel-body">
                <b>
                    <legend>Alamat</legend>
                    <p>
                        {{ $r->alamat }}, Rt {{ $r->rt }}/{{ $r->rt }}, {{ $r->desa->desa }}, {{ $r->desa->kecamatan->kecamatan }}<br>
                        {{ $r->desa->kecamatan->kabupaten->kabupaten }} - {{ $r->desa->kecamatan->kabupaten->provinsi->provinsi }}
                    </p>
                    <legend>Kontak</legend>
                    <label>No. Telp : {{ $r->no_telp }}</label><br>
                    <label>No. Fax : {{ $r->no_fax }}</label><br>
                    <label>Website : <a href="{{ $r->website }}" target="_blank">{{ $r->website }}</a></label>
                    <legend>Guru</legend>
                    <label>Kepala Sekolah : {{ $r->kepala_sekolah }}</label><br>
                    <?php
                    $jumlahguru = App\Guru::where('sekolah_id', '=', $r->id)->count();
                    ?>
                    <label>Jumlah Guru : {{ $jumlahguru }}</label>
                </b>
            </div>
            <div class="panel-footer">
                <a href="{{ url($r->nss.'/sekolah') }}" class="btn btn-primary btn-block">Lihat</a>
            </div>
        </div>
        @endforeach                                    
    </div>    
    @endsection
