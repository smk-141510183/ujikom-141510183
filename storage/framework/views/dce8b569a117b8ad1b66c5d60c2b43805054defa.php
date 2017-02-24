<?php $__env->startSection('content'); ?>
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Tunjangan Pegawai</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('tunjanganpegawai.store')); ?>" method="POST">
                    <div class="form-group<?php echo e($errors->has('pegawai_id') ? ' has-error' : ''); ?>">
                            <label for="pegawai_id" class="col-md-4 control-label"> Pegawai :</label>
                                <div class="col-md-6">
                                    <select type="text" name="pegawai_id" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo $data->nip; ?>_<?php echo $data->User->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('pegawai_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('pegawai_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <?php if(isset($missing_count)): ?>
                            <div style="width: 100%;color: red;text-align: center;">
                                Pegawai TIdak Memiliki Tunjangan<a href="<?php echo e(url('tunjangan/create')); ?>">KLIK DISINI</a>
                            </div>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>