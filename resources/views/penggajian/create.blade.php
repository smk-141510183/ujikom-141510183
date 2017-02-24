@extends('layouts.app')
@section('content')
<title>Penggajian</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Penggajian</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('penggajian.store')}}" method="POST">
                    <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label"> Pegawai :</label>
                                <div class="col-md-6">
                                    <select type="text" name="pegawai_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                                @if (isset($_GET['errors_match']))
                            <span class="help-block">
                                    <strong>Pegawai Sudah Mengambil Gaji</strong>
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