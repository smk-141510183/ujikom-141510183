@extends('layouts.app')
@section('content')
<?php $page = "Tabel Tunjangan" ?>
<div align="right">
    <div class="col-lg-12" >
        <div class="panel panel-default">
            <div class="panel-heading" align="center">{{$page}}</div>
            <a href="{{route('tunjangan.create')}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead >
                                <tr class="success">
                                    <th>No.</th>
                                    <th>Kode Tunjangan</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nama Golongan</th>
                                    <th>Status</th>
                                    <th>Jumlah Anak</th>
                                    <th>Besaran Uang</th>
                                    <th colspan="3"><center>Opsi</center></th>
                                </tr>
                            </thead>
                            <?php
                                $no=1;
                            ?>    
                            <tbody>
                            @foreach($tunjangan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kode_tunjangan}}</td>
                                    <td>{{$data->jabatan->nama_jabatan}}</td>
                                    <td>{{$data->golongan->nama_golongan}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>{{$data->jumlah_anak}}</td>
                                    <td>{{$data->besaran_uang}}</td>
                                    <td align="right">
                                    <a href="{{route('tunjangan.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('tunjangan.destroy', $data->id),
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