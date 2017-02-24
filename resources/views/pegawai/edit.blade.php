@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Kategori Lembur</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('pegawai.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data->user->name }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
            
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" class="form-control" name="email" value="{{ $data->user->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP :</label>
                                <div class="col-md-6">
                                    <input type="text" name="nip" value="{{$data->nip}}" class="form-control">
                                    @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>

                    <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="jabatan_id" class="form-control">
                                @foreach ($jabatan as $jabatans)
                                <option value="{{$jabatans->id}}" <?php if ($data->jabatan_id==$jabatans->id) {echo "selected";} ?>>{{$jabatans->nama_jabatan}}</option>
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
                                @foreach ($golongan as $golongans)
                                <option value="{{$golongans->id}}" <?php if ($data->golongan_id==$golongans->id) {echo "selected";} ?>>{{$golongans->nama_golongan}}</option>
                                @endforeach
                            </select>
                                </div>
                    </div>

                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-4 control-label">
                            <img src="/assets/image/{{$data->photo}}" width="100px" height="100px">
                                </label>
                                <div>
                                <input id="photo" type="file" name="photo" style="margin-top: 50px" >
                                    @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
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