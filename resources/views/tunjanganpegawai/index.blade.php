@extends('layouts.aa')
@section('content')
<?php $page = "Tabel Tunjangan Pegawai" ?>
<div align="right">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">{{$page}}</div>
                <a href="{{route('tunjanganpegawai.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                <div class="panel-body" align="center">
					<div class="table-responsive ">
						<table class="table">
							<thead >
								<tr class="success">
									<th>No.</th>
									<th>Kode Tunjangan</th>
									<th>NIP Pegawai</th>		
									<th>Nama Pegawai</th>
									<th>Besar Tunjangan</th>
									<th colspan="3"><center>Opsi</center></th>
								</tr>
							</thead>
							<?php
								$no=1;
							?>
							<tbody>
							@foreach($tunjangan_pegawai as $data)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$data->tunjangan->kode_tunjangan}}</td>
									<td>{{$data->pegawai->nip}}</td>
									<td>{{$users->where('id',$data->pegawai->user_id)->first()->name}}</td>
									<td>{{$data->tunjangan->besaran_uang}}</td>
									<td align="right">
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