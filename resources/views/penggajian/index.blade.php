@extends('layouts.app')
@section('content')
<?php $page = "Tabel Penggajian" ?>
<div align="right">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">{{$page}}</div>
                <a href="{{route('penggajian.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                <div class="panel-body" align="center">
					<div class="table-responsive ">
					<div class="table-responsive table-bordered">
						<table class="table">
							<thead >
								<tr class="success">
									<th>No.</th>
									<th>Tunjangan Pegawai</th>
									<th>NIP Pegawai</th>
									<th>Nama Pegawai</th>
									<th>Jumlah Jam Lembur</th>
									<th>Jumlah Uang Lembur</th>
									<th>Gaji Pokok</th>
									<th>Total Gaji</th>
									<th colspan="3"><center>Opsi</center></th>
								</tr>
							</thead>
							<?php
							$no=1;
							?>
							<tbody>
							@foreach($penggajian as $data)
								<tr>
								<?php 
                                	$pegawai = $pegawai->where('id',$data->tunjangan_pegawai->pegawai_id)->first();
                             	?>	<td>{{$no++}}</td>
									<td>{{$data->tunjangan_pegawai_id}}</td>
									<td>{{$pegawai->where('id',$data->tunjangan_pegawai->pegawai_id)->first()->nip}}</td>
									<td>{{$pegawai->User->name}}</td>
									<td>{{$data->jumlah_jam_lembur}}</td>
									<td>{{$data->jumlah_uang_lembur}}</td>
									<td>{{$data->gaji_pokok}}</td>
									<td>{{$data->total_gaji}}</td>
									<td align="right">
                                    <a href="{{route('tunjanganpegawai.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('tunjanganpegawai.destroy', $data->id),
                                    'model' => $data
                                  ])
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
</div>
@endsection