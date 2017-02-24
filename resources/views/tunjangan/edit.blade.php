@extends('layouts.app')
@section('content')
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Tunjangan</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('tunjangan.update',$tunjangan->id)}}" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}    
                    <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
                            <label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan :</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_tunjangan" value="{{$tunjangan->kode_tunjangan}}" class="form-control" autofocus>
                                    @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="jabatan_id" class="form-control">
                                @foreach ($jabatan as $jabatan)
                                <option value="{{$jabatan->id}}" <?php if ($tunjangan->jabatan_id==$jabatan->id) {echo "selected";} ?>>{{$jabatan->nama_jabatan}}</option>
                                @endforeach
                            </select>
                                    @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan :</label>
                                <div class="col-md-6">
                            <select name="golongan_id" class="form-control">
                                @foreach ($golongan as $golongan)
                                <option value="{{$golongan->id}}" <?php if ($tunjangan->golongan_id==$golongan->id) {echo "selected";} ?>>{{$golongan->nama_golongan}}</option>
                                @endforeach
                            </select>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status :</label>
                                <div class="col-md-6">
                                    <input type="text" name="status" value="{{$tunjangan->status}}" class="form-control">
                                    @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
                            <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak :</label>
                                <div class="col-md-6">
                                    <input type="numeric" name="jumlah_anak" value="{{$tunjangan->jumlah_anak}}" class="form-control">
                                    @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                                <div class="col-md-6">
                                    <input type="text" name="besaran_uang" value="{{$tunjangan->besaran_uang}}" class="form-control">
                                    @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
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