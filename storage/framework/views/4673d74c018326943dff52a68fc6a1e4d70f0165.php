<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Jabatan</h2></div>
                    
                <div class="panel-body">

                        <?php echo Form::model($jabatan,['method'=>'PATCH','route'=>['jabatan.update',$jabatan->id]]); ?>

                            <div class="col-md-6">
                                <label for="kode_jabatan">Kode Jabatan</label>
                                <input id="kode_jabatan" value="<?php echo e($jabatan->kode_jabatan); ?>" type="text" class="form-control" name="kode_jabatan" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="nama_jabatan">Nama Jabatan</label>
                                <input id="nama_jabatan" value="<?php echo e($jabatan->nama_jabatan); ?>" type="text" class="form-control" name="nama_jabatan" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="besaran_uang">Besaran Uang</label>
                                <input id="besaran_uang" value="<?php echo e($jabatan->besaran_uang); ?>" type="text" class="form-control" name="besaran_uang" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                            </div>

                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>