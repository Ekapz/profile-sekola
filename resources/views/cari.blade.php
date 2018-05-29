@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Hasil Pencarian {{ $cari }}</div>
                <div class="panel-body">
                    @foreach($sekolahan as $sekolah)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $sekolah->nama }}</div>
                            <div class="panel-body">                                
                                {{ $sekolah->desa->desa }}<br>
                                {{ $sekolah->desa->kecamatan->kecamatan }}<br>
                                {{ $sekolah->desa->kecamatan->kabupaten->kabupaten }}<br>
                                {{ $sekolah->desa->kecamatan->kabupaten->provinsi->provinsi }}<br>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary btn-block">Lihat</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
