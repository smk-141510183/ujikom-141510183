<?php $__env->startSection('content'); ?>
<?php $page = "Tabel Penggajian" ?>
<div align="right">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><?php echo e($page); ?></div>
                <a href="<?php echo e(route('penggajian.create')); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
							
							<?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($no++); ?></td>
									<td><?php echo e($users->name); ?></td>
									<td><?php echo e($tunjangan->besaran_uang); ?></td>
									<td><?php echo e($pegawai->nip); ?></td>
									<td align="right" class="action-web">
									<a href="<?php echo e(url('penggajian',$data->id)); ?>" class="btn btn-primary" title="Details"><i class="glyphicon glyphicon-folder-open"></i></a></td>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('penggajian.destroy', $data->id),
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
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>