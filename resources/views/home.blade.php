@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <form action="{{ route('cari') }}" method="post">
                {{ csrf_field() }}
                <label>Cari Sekolah</label>
                        <input type="text" name="cari" class="form-control">
                        <button type="submit" class="btn btn-primary btn-block">Cari <i class="fa fa-search fa-fw"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
