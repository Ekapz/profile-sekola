@extends('layouts.admin')

@section('head-content')
<!-- Light Gallery Plugin Css -->
<link href="{{asset('plugins/light-gallery/css/lightgallery.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="block-header">
	<h2>Sekolah</h2>
</div>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Data Sekolah
				</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a data-toggle="modal" data-target="#addModal">Tambah</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="body">
				<div class="table-responsive">          
					<table class="table table-bordered table-striped table-hover table-condensed">
						<thead>
							<tr>               
								<th>NSS</th>
								<th>Nama Sekolah</th>
								<th>Alamat</th>               
								<th>Kontak</th>               
								<th>Foto</th>               
								<th>Kepsek</th>
								<th>Option</th>
							</tr>
						</thead>            
						<tbody>
							@foreach($sekolah as $r)
							<tr>
								<td>{{$r->nss}}</td>
								<td>{{$r->nama}}</td>
								<td>
									{{$r->alamat}} , rt.{{$r->rt}}/{{$r->rw}}                
									<br><b>Desa {{$r->desa->desa}}</b>
								</td>
								<td>
									Telepone : {{$r->no_telp}}
									<br>Faximili : {{$r->no_fax}}
									<br>Email : {{$r->email}}
									<br>Website : <a href="{{$r->website}}">{{$r->website}}</a>
								</td>
								<td>
									<div id="aniimated-thumbnials" class="list-unstyled row">
										<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
											<a href="{{ asset('uploads/'.$r->image) }}" data-sub-html="{{$r->nama}}">
												<img class="img-responsive img-rounded" src="{{ asset('uploads/'.$r->image) }}">
											</a>
										</div>
									</div>
								</td>
								<td>{{$r->kepala_sekolah}}</td>
								<td class="text-center">
									<button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}editModal">
										<i class="material-icons">edit</i>                    
									</button>
									<button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}deleteModal">
										<i class="material-icons">delete</i>                    
									</button>                  
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Tambah Sekolah</h4>
			</div>
			<form method="post" action="{{route('addSekolah')}}" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-sm-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="form-label">NSS</label>
								<div class="form-line">
									<input type="number" class="form-control" name="nss" required autofocus />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Nama Sekolah</label>
								<div class="form-line">
									<input type="text" class="form-control" name="nama" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Alamat</label>
								<div class="form-line">                  
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<p>
									<b>Desa</b>
								</p>
								<select class="form-control show-tick" data-live-search="true" name="desa_id" required>
									@foreach($semuadesa as $desa)
									<option value="{{ $desa->id }}">{{ $desa->desa }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group"> 
								<label class="form-label">Rw</label>
								<div class="form-line">
									<input type="number" class="form-control" name="rw" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Rt</label>
								<div class="form-line">
									<input type="number" class="form-control" name="rt" required />
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Telepone</label>
								<div class="form-line">
									<input type="number" class="form-control" name="no_telp" required />
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Faximile</label>
								<div class="form-line">
									<input type="number" class="form-control" name="no_fax" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Email</label>
								<div class="form-line">
									<input type="email" class="form-control" name="email" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Website</label>
								<div class="form-line">
									<input type="url" class="form-control" name="website" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Nama Kepala Sekolah</label>
								<div class="form-line">
									<input type="text" class="form-control" name="kepala_sekolah" required />
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Upload Foto</label>
								<div class="form-line">									
									<input name="image" type="file" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success waves-effect">Simpan</button>
					<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@foreach($sekolah as $r)
<div class="modal fade" id="{{ $r->id }}editModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edit Sekolah</h4>
			</div>
			<form method="post" action="{{ route('editSekolah') }}">
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-sm-12">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $r->id }}">
							<div class="form-group">
								<label class="form-label">Nss</label>
								<div class="form-line">
									<input type="number" class="form-control" name="Nss" value="{{ $r->nss }}" required autofocus />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Nama Sekolah</label>
								<div class="form-line">
									<input type="text" class="form-control" name="desa" value="{{ $r->nama }}" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">Alamat</label>
								<div class="form-line">
									<input type="text" class="form-control" name="alamat" value="{{ $r->alamat }}" required />
								</div>
							</div>
							<div class="form-group"> 
								<label class="form-label">no_telp</label>
								<div class="form-line">
									<input type="text" class="form-control" name="no_telp" value="{{ $r->no_telp }}" required />
								</div>
							</div>
							<div class="form-group">
								<input name="image" type="file" />
							</div>							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success waves-effect">Simpan</button>
					<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@foreach($sekolah as $r)
<div class="modal fade" id="{{ $r->id }}deleteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="smallModalLabel">Hapus Sekolah</h4>
			</div>
			<div class="modal-body">
				Yakin ingin menghapus desa {{ $r->sekolah }}?
			</div>
			<form method="post" action="{{ route('deleteSekolah') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $r->id }}">
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger waves-effect">Hapus</button>
					<button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection

@section('foot-content-no-script')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/light-gallery/js/lightgallery-all.js')}}"></script>
<script src="{{asset('js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>
@endsection