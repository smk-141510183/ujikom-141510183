<?php $__env->startSection('content'); ?>
<div align="center">
<div class="col-md-12">
	<div class="panel panel-default">
	<h1>Tabel Jabatan</h1>
		<div class="panel-heading">
		<a href="<?php echo e(route('jabatan.create')); ?>" class="btn btn-primary">Tambah Data</a>
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
					<?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($no++); ?></td>
							<td><?php echo e($data->kode_jabatan); ?></td>
							<td><?php echo e($data->nama_jabatan); ?></td>
							<td><?php echo e($data->besaran_uang); ?></td>
							<td align="right">
                                    <a href="<?php echo e(route('jabatan.edit', $data->id)); ?>" class="btn btn-primary">Edit</a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('jabatan.destroy', $data->id),
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