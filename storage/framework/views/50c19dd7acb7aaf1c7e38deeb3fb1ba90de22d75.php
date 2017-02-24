<?php $__env->startSection('content'); ?>
<title>Penggajian</title>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Petugas Penerima</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo e(route('penggajian.update',$data->id)); ?>" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('petugas_penerima') ? ' has-error' : ''); ?>">
                            <label for="petugas_penerima" class="col-md-3 control-label"> Petugas :</label>
                                <div class="col-md-6">
                                    <?php echo Form::text('petugas_penerima',Auth::user()->name,['class'=>'form-control','disabled']); ?>

                                    <?php echo Form::hidden('petugas_penerima',Auth::user()->name,['class'=>'form-control']); ?>

                                </div>
                    </div>
                    <div class="form-group">
                                <div class="col-md-offset-4">
                                    <button type="submit" name="status_pengambilan" class="btn btn-primary" value="1">
                                        SUBMIT
                                    </button>
                                    <?php if($errors->has('status_pengambilan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status_pengambilan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
				</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>