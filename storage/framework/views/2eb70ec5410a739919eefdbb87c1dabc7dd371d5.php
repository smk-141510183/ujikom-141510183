<?php $__env->startSection('content'); ?>
<?php $page = "Tabel Kategori Lembur" ?>
<div align="right">
	<div class="col-lg-12" >
	    <div class="panel panel-default">
	        <div class="panel-heading" align="center"><?php echo e($page); ?></div>
	        <a href="<?php echo e(route('kategorilembur.create')); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
							<?php $__currentLoopData = $kategori_lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($no++); ?></td>
									<td><?php echo e($data->kode_lembur); ?></td>
									<td><?php echo e($data->jabatan->nama_jabatan); ?></td>
									<td><?php echo e($data->golongan->nama_golongan); ?></td>
									<td><?php echo e($data->besaran_uang); ?></td>
									<td align="right">
                                    <a href="<?php echo e(route('kategorilembur.edit', $data->id)); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('kategorilembur.destroy', $data->id),
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
<?php echo $__env->make('layouts.penggajian', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>