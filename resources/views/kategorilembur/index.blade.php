@extends('layouts.app')
@section('content')
<?php $page = "Tabel Kategori Lembur" ?>
<div align="right">
	<div class="col-lg-12" >
	    <div class="panel panel-default">
	        <div class="panel-heading" align="center">{{$page}}</div>
	        <a href="{{route('kategorilembur.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
				<div class="panel-body">
					<div class="table-responsive table-bordered">
						<table class="table">
							<thead >
								<tr class="success">
									<th>No.</th>
									<th>Kode Kategori Lembur</th>	
									<th>Jabatan</th>
									<th>Golongan</th>
									<th>Besaran Uang</th>
									<th colspan="3"><center>Opsi</center></th>
								</tr>
							</thead>
							<?php
								$no=1;
							?>	
							<tbody>
							@foreach($kategori_lembur as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$data->kode_lembur}}</td>
									<td>{{$data->jabatan->nama_jabatan}}</td>
									<td>{{$data->golongan->nama_golongan}}</td>
									<td>{{$data->besaran_uang}}</td>
									<td align="right">
                                    <a href="{{route('kategorilembur.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('kategorilembur.destroy', $data->id),
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