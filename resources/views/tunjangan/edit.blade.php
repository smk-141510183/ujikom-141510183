@extends('layouts.aa')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Tunjangan</div>
                    
                <div class="panel-body">

                        {!!Form::model($tunjangan,['method'=>'PATCH','route'=>['tunjangan.update',$tunjangan->id]])!!}

                            <div class="col-md-12">
                                <label for="kode_tunjangan" >Kode Tunjangan</label>
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="{{$tunjangan->kode_tunjangan}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                 <label for="jabatan_id">Nama Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        @foreach($jabatan as $datajabatan)
                                            <option  value="{{$datajabatan->id}}" >{{$datajabatan->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            
                            <div class="col-md-6">
                                 <label for="golongan_id">Nama Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
                                        @foreach($golongan as $datagolongan)
                                            <option  value="{{$datagolongan->id}}" >{{$datagolongan->nama_golongan}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-12">
                                <label for="status" >Status</label>
                                <input id="status" type="text" class="form-control" name="status" value="{{$tunjangan->status}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label for="jumlah_anak" >Jumlah Anak</label>
                                <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" value="{{$tunjangan->jumlah_anak}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label for="besaran_uang" >Besaran Uang</label>
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" value="{{$tunjangan->besaran_uang}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
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
