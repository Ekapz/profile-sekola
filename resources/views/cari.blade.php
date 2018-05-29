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
                            <div class="panel-heading text-center"><b>{{ $sekolah->nama }}</b></div>
                            <img src="{{ asset('uploads/'.$sekolah->image) }}" class="img-responsive">
                            <div class="panel-body">
                                <b>
                                    <legend>Alamat</legend>
                                    <p>
                                        {{ $sekolah->alamat }}, Rt {{ $sekolah->rt }}/{{ $sekolah->rt }}, {{ $sekolah->desa->desa }}, {{ $sekolah->desa->kecamatan->kecamatan }}<br>
                                        {{ $sekolah->desa->kecamatan->kabupaten->kabupaten }} - {{ $sekolah->desa->kecamatan->kabupaten->provinsi->provinsi }}
                                    </p>
                                    <legend>Kontak</legend>
                                    <label>No. Telp : {{ $sekolah->no_telp }}</label><br>
                                    <label>No. Fax : {{ $sekolah->no_fax }}</label><br>
                                    <label>Website : <a href="{{ $sekolah->website }}" target="_blank">{{ $sekolah->website }}</a></label>
                                    <legend>Guru</legend>
                                    <label>Kepala Sekolah : {{ $sekolah->kepala_sekolah }}</label>
                                    <?php
                                    $jumlahguru = App\Guru::where('sekolah_id', '=', $sekolah->id)->count();
                                    ?>
                                    <label>Jumlah Guru : {{ $jumlahguru }}</label>
                                </b>
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
