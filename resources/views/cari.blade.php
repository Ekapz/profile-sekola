@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Hasil Pencarian {{ $cari }}</div>

                <div class="panel-body">
                @foreach($sekolahan as $sekolah)
                {{ $sekolah->nama }}
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
