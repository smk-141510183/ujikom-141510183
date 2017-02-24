<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Lembur Pegawai</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('lemburpegawai.update',$lembur_pegawai->id)); ?>" method="POST">  
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>  
                    <div class="form-group<?php echo e($errors->has('pegawai_id') ? ' has-error' : ''); ?>">
                            <label for="pegawai_id" class="col-md-4 control-label">Pegawai:</label>
                                <div class="col-md-6">
                                    <input type="text" name="pegawai_id" value="<?php echo e($users->where('id',$lembur_pegawai->pegawai->user_id)->first()->name); ?>" class="form-control" disabled>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('kode_lembur_id') ? ' has-error' : ''); ?>">
                            <label for="kode_lembur_id" class="col-md-4 control-label">Kode Lembur Id:</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_lembur_id" value="<?php echo e($lembur_pegawai->kategori_lembur->kode_lembur); ?>" class="form-control" disabled>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('jumlah_jam') ? ' has-error' : ''); ?>">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah jam :</label>
                                <div class="col-md-6">
                                    <input type="text" name="jumlah_jam" value="<?php echo e($lembur_pegawai->jumlah_jam); ?>" class="form-control">
                                    <?php if($errors->has('jumlah_jam')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>