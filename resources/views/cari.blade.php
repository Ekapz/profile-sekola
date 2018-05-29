@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(sizeof($sekolahan)<=0)
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tidak Ditemukan Hasil Dari Pencarian <b>{{ $cari }}</b></div>
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
        @else
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Hasil Pencarian {{ $cari }}</div>
                <div class="panel-body">
                    <div class="row row-now">
                        @foreach($sekolahan as $sekolah)
                        <div class="panel panel-now panel-default">
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
                                    <label>Kepala Sekolah : {{ $sekolah->kepala_r }}</label><br>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
