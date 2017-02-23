@extends('layouts.aa')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Lembur Pegawai</div>
                    
                <div class="panel-body">

                        {!!Form::model($lemburpegawai,['method'=>'PATCH','route'=>['lemburpegawai.update',$lemburpegawai->id]])!!}
                            <div class="col-md-6">
                                 <label for="kode_lembur_id">Kode Lembur</label>
                                    <select class="col-md-6 form-control" name="kode_lembur_id">
                                        @foreach($kategorilembur as $datakategorilembur)
                                            <option  value="{{$datakategorilembur->id}}" >{{$datakategorilembur->kode_lembur}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            
                             <div class="col-md-6">
                                <label for="pegawai_id">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="pegawai_id">
                                        @foreach($pegawai as $datapegawai)
                                            <option  value="{{$datapegawai->id}}" >{{$datapegawai->User->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_jam">Jumlah Jam</label>
                                <input id="jumlah_jam" value="{{$lemburpegawai->jumlah_jam}}" type="text" class="form-control" name="jumlah_jam" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_jam') }}</strong>
                                    </span>
                            </div>

                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

       
@endsection
