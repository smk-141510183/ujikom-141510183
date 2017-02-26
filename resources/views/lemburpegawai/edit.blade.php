@extends('layouts.aa')
@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Lembur Pegawai</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('lemburpegawai.update',$lembur_pegawai->id)}}" method="POST">  
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}  
                    <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label">Pegawai:</label>
                                <div class="col-md-6">
                                    <input type="text" name="pegawai_id" value="{{$users->where('id',$lembur_pegawai->pegawai->user_id)->first()->name}}" class="form-control" disabled>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('kode_lembur_id') ? ' has-error' : '' }}">
                            <label for="kode_lembur_id" class="col-md-4 control-label">Kode Lembur Id:</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_lembur_id" value="{{$lembur_pegawai->kategori_lembur->kode_lembur}}" class="form-control" disabled>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah jam :</label>
                                <div class="col-md-6">
                                    <input type="text" name="jumlah_jam" value="{{$lembur_pegawai->jumlah_jam}}" class="form-control">
                                    @if ($errors->has('jumlah_jam'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlah_jam') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection