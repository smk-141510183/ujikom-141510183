@extends('layouts.app')
@section('content')
<?php $page="Tabel Pegawai"?>
<div align="right">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">{{$page}}</div>
                <a href="{{route('pegawai.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                <div class="panel-body" align="center">
						<table class="table">
							<thead>
								<tr class="success">
									<th>No.</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th>Golongan</th>
									<th>Photo</th>
									<th colspan="3"><center>Aksi</center></th>
								</tr>
							</thead>
							<?php
							$no=1;
							?>
							<tbody>
							@foreach($pegawai as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$data->nip}}</td>
									<td>{{$data->User->name}}</td>
									<td>{{$data->User->email}}</td>
									<td>{{$data->jabatan->nama_jabatan}}</td>
									<td>{{$data->golongan->nama_golongan}}</td>
									<td><img src="/assets/image
									/{{$data->photo}}" width="70" height="70"></td>
									<td align="right">
                                    <a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('pegawai.destroy', $data->id),
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