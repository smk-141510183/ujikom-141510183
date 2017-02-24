@extends('layouts.app')
@section('content')
<?php $page = "Tabel Jabatan" ?>
<div align="right">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading" align="center">{{$page}}</div>
		<a href="{{route('jabatan.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
			<div class="panel-body">
			  <div class="table-responsive table-bordered">
				<table class="table">
					<thead>
						<tr class="success">
							<th>No.</th>
							<th>Kode jabatan</th>
							<th>Nama jabatan</th>
							<th>Besaran Uang</th>
							<th colspan="3"><center>Opsi</center></th>
						</tr>
					</thead>
					<?php
						$no=1;
					?>	
					<tbody>
					@foreach($jabatan as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->kode_jabatan}}</td>
							<td>{{$data->nama_jabatan}}</td>
							<td>{{$data->besaran_uang}}</td>
							<td align="right">
                                    <a href="{{route('jabatan.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('jabatan.destroy', $data->id),
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