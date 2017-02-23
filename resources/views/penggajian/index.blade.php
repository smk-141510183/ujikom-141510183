@extends('layouts.aa')
@section('content')
<?php $page = "Tabel Penggajian" ?>
<div align="right">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">{{$page}}</div>
                <a href="{{route('penggajian.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                <div class="panel-body" align="center">
					<div class="table-responsive ">
					<div class="table-responsive ">
						<table class="table">
							<thead >
								<tr class="success">
									<th>No.</th>
									<th>Nama Pegawai</th>
									<th>Tunjangan Pegawai</th>
									<th>NIP Pegawai</th>
									<th colspan="3"><center>Opsi</center></th>
								</tr>
							</thead>
							<?php
							$no=1;
							?>
							<tbody>
							
							@foreach($penggajian as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$users->name}}</td>
									<td>{{$tunjangan->besaran_uang}}</td>
									<td>{{$pegawai->nip}}</td>
									<td align="right" class="action-web">
									<a href="{{url('penggajian',$data->id)}}" class="btn btn-primary" title="Details"><i class="glyphicon glyphicon-folder-open"></i></a></td>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('penggajian.destroy', $data->id),
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