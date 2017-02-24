<?php $__env->startSection('content'); ?>
<div align="center">
	<div class="col-lg-12" >
	    <div class="panel panel-default">
	    <h1>Tabel Lembur Pegawai</h1>
	        <div class="panel-heading">
	        <a href="<?php echo e(route('lemburpegawai.create')); ?>" class="btn btn-primary">Tambah Data</a>
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
							<?php $__currentLoopData = $lembur_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($no++); ?></td>
									<td><?php echo e($data->kategori_lembur->kode_lembur); ?></td>
									<td><?php echo e($users->where('id',$data->pegawai->user_id)->first()->name); ?></td>
									<td><?php echo e($data->jumlah_jam); ?></td>
									<td align="right">
                                    <a href="<?php echo e(route('lemburpegawai.edit', $data->id)); ?>" class="btn btn-primary">Edit</a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('lemburpegawai.destroy', $data->id),
                                    'model' => $data
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>