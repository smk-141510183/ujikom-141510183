@extends('layouts.app')
@section('content')
<?php $page = "Tabel Lembur Pegawai" ?>
<div align="right">
	<div class="col-lg-12" >
	    <div class="panel panel-default">
	        <div class="panel-heading" align="center">{{$page}}</div>
	        <a href="{{route('lemburpegawai.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
				<div class="panel-body">
					<div class="table-responsive table-bordered">
						<table class="table">
							<thead >
								<tr class="success">
									<th>No.</th>
									<th>Kode Kategori Lembur</th>
									<th>Nama Pegawai</th>
									<th>Jumlah Jam</th>
									<th colspan="3"><center>Opsi</center></th>
								</tr>
							</thead>
							<?php
								$no=1;
							?>	
							<tbody>
							@foreach($lembur_pegawai as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$data->kategori_lembur->kode_lembur}}</td>
									<td>{{$users->where('id',$data->pegawai->user_id)->first()->name}}</td>
									<td>{{$data->jumlah_jam}}</td>
									<td align="right">
                                    <a href="{{route('lemburpegawai.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('lemburpegawai.destroy', $data->id),
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