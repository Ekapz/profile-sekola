@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading"><h2>DEPENDENT SELECT BOX(Country & States)</h2></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-group-sm">

                            <div class="col-md-6">
                                <select name="country" class="form-control">
                                    <option value="">--Select Country--</option>
                                    @foreach ($semuaprovinsi as $r)
                                    <option value="{{ $r->id }}"> {{ $r->provinsi }}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="state" class="form-control">
                                   <option>--State--</option>

                               </select>
                           </div><div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>

                       </div>
                   </form>
               </div>

               <div class="panel-footer">- By: [Your Name]</div>
           </div>
       </div>

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
</div>

<script>
   $(document).ready(function() {

    $('select[name="country"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/states/get/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="state"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="state"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="state"]').empty();
        }

    });

});
</script>
@endsection
