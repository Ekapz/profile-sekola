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
                                    <input type="text" class="form-control input-lg" name="cari" placeholder="Nama Sekolah">
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
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Sekolah</div>
                <div class="body">
                    <div class="table-responsive">          
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                                <tr class="success">               
                                    <th>NSS</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>               
                                    <th>Kontak</th>               
                                    <th>Foto</th>
                                    <th>Lihat Selengkapnya</th>                                               
                                </tr>
                            </thead>            
                            <tbody id="aniimated-thumbnials" class="list-unstyled row text-center table-striped">
                                @foreach($sekolah as $r)
                                <tr>
                                    <td>{{$r->nss}}</td>
                                    <td>{{$r->nama}}</td>
                                    <td>
                                        {{$r->alamat}} , rt.{{$r->rt}}/{{$r->rw}}                
                                        <hr><b>Desa {{$r->desa->desa}}</b>
                                    </td>
                                    <td>
                                        Telepone : {{$r->no_telp}}
                                        <hr>Faximili : {{$r->no_fax}}
                                        <hr>Email : {{$r->email}}
                                        <hr>Website : <a href="{{$r->website}}">{{$r->website}}</a>
                                        <hr>Kepala Sekolah : {{$r->kepala_sekolah}}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ asset('uploads/'.$r->image) }}" data-sub-html="{{$r->nama}}">
                                            <img class="img-responsive img-rounded" src="{{ asset('uploads/'.$r->image) }}">
                                        </a>        
                                    </td>
                                    <td class="text-center"><button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}editModal">
                                        <i class="material-icons">Lihat</i>                    
                                    </button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
