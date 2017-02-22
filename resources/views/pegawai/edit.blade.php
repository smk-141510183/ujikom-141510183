@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Pegawai</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('pegawai.update', $pegawai->id)}}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP :</label>
                                <div class="col-md-6">
                                    <input type="text" name="nip" value="{{$pegawai->nip}}" class="form-control">
                                    @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Nama Pegawai :</label>
                                <div class="col-md-6">
                                    <input type="text" name="user_id" value="{{$pegawai->User->name}}" class="form-control" disabled>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="jabatan_id" class="form-control">
                                @foreach ($jabatan as $jabatan)
                                <option value="{{$jabatan->id}}" <?php if ($pegawai->jabatan_id==$jabatan->id) {echo "selected";} ?>>{{$jabatan->nama_jabatan}}</option>
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
                            <select name="jabatan_id" class="form-control">
                                @foreach ($golongan as $golongan)
                                <option value="{{$golongan->id}}" <?php if ($pegawai->golongan_id==$golongan->id) {echo "selected";} ?>>{{$golongan->nama_golongan}}</option>
                                @endforeach
                            </select>
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