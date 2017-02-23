<?php $page = 'View Penggajian' ?>
<?php $root = 'penggajian' ?>
@extends('layouts.aa')

@section('footer')
<a href="{{url($root)}}">Penggajian</a> > <a href="{{url($root,$data->id)}}">View</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body" align="center">
                    <img src="/assets/image/{{$pegawai->photo}}" width="100" height="100">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<div class="panel-title">Gaji</div>
    			</div>
    			<div class="panel-body">
    				<table class="table table-hover">
    					<tr>
    						<td>Nama :</td>
    						<td>{{$pegawai->User->name}}</td>
    					</tr>
    					<tr>
    						<td>Jabatan {{$pegawai->jabatan->nama_jabatan}}</td>
    						<td>
    						<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php $pegawai->jabatan->tunjangan_uang = number_format($pegawai->jabatan->besaran_uang,0,',','.'); ?>
								{!! Form::label('tunjangan_uang',$pegawai->jabatan->besaran_uang,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Golongan {{$pegawai->golongan->nama_golongan}}</td>
    						<td>
    						<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php $pegawai->golongan->tunjangan_uang = number_format($pegawai->golongan->besaran_uang,0,',','.'); ?>
								{!! Form::label('tunjangan_uang',$pegawai->golongan->besaran_uang,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Gaji Pokok</td>
    						<td>
    						<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php $data->gaji_pokok = number_format($data->gaji_pokok,0,',','.'); ?>
								{!! Form::label('besaran_uang',$data->gaji_pokok,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Total Gaji</td>
    						<td>
    						<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php $data->total_gaji = number_format($data->total_gaji,0,',','.'); ?>
								{!! Form::label('besaran_uang',$data->total_gaji,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Tujangan<br>{{$tunjangan->status}} <?php if ($tunjangan->jumlah_anak == 0) {} else{echo 'jumlah anak '.$tunjangan->jumlah_anak;} ?></td>
    						<td>
    						<div class="input-group">
    						<span class="input-group-addon">Rp.</span>
								<?php $tunjangan->besaran_uang = number_format($tunjangan->besaran_uang,0,',','.'); ?>
								{!! Form::label('besaran_uang',$tunjangan->besaran_uang,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
							</td>
    					</tr>
    					<tr>
    						<td>{!! Form::label('Status Pengambilan') !!}</td>
    						<td>
    							<?php 
                            switch ($data->status_pengambilan) {
                                case 1 :
                                    echo "<b href='#' class='btn btn-block btn-danger disabled'>Gaji Sudah Diambil</b>";
                                    break;
                                
                                case 0:
                                    echo "<a href=".url($root.'/'.$data->id.'/edit')." class='btn btn-primary'>Ambil Gaji Bulan Ini</a>";
                                    break;
                                default :
                                    break;
                            }
                             ?>
    						</td>
    					</tr>
    					@if($data->status_pengambilan==1)
    					<tr>
    						<td>Tanggal Pengambillan</td>
    						<td>{!! Form::date('',$data->tanggal_pengambilan,['class'=>'form-control','disabled']) !!}</td>
    					</tr>
    					<tr>
    						<td>Petugas Penerima</td>
    						<td>{!! Form::label('',$data->petugas_penerima,['class'=>'form-control']) !!}</td>
    					</tr>
    					@endif
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<div class="panel-title">Lembur</div>
    			</div>
    			<div class="panel-body">
	    			<table class="table table-hover">
	    				<tr>
    						<td>Jumlah Jam Lembur</td>
    						<td>
    						<div class="input-group">
								{!! Form::label('jumlah_jam',$data->jumlah_jam_lembur,['class'=>'form-control','id'=>'appendprepend','style'=>'text-align:right;']) !!}
								<span class="input-group-addon">Jam</span>
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Uang Lembur <br>{{$pegawai->jabatan->nama_jabatan}} & {{$pegawai->golongan->nama_golongan}}</td>
    						<td>
    						<div class="input-group">
    							<span class="input-group-addon">Rp.</span>
    							<?php $kategori_lembur->besaran_uang = number_format($kategori_lembur->besaran_uang,2,',','.'); ?>
								{!! Form::label('Bayaran Lembur',$kategori_lembur->besaran_uang,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    						<td>Jumlah Uang Lembur</td>
    						<td>
    						<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php $data->jumlah_uang_lembur = number_format($data->jumlah_uang_lembur,2,',','.'); ?>
								{!! Form::label('besaran_uang',$data->jumlah_uang_lembur,['class'=>'form-control','id'=>'appendprepend']) !!}
							</div>
    						</td>
    					</tr>
    					<tr>
    					</tr>
					</table>
    			</div>
    		</div>
    	</div>
    </div>
    <a href="/penggajian" class='btn btn-primary'><p class="fa fa-reply-all "></p></a>
</div>

@endsection
