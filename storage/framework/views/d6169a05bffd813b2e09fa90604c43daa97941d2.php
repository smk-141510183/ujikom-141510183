<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Tunjangan</div>
                    
                <div class="panel-body">

                        <?php echo Form::model($tunjangan,['method'=>'PATCH','route'=>['tunjangan.update',$tunjangan->id]]); ?>


                            <div class="col-md-12">
                                <label for="kode_tunjangan" >Kode Tunjangan</label>
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="<?php echo e($tunjangan->kode_tunjangan); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                 <label for="jabatan_id">Nama Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>
                            
                            <div class="col-md-6">
                                 <label for="golongan_id">Nama Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datagolongan->id); ?>" ><?php echo e($datagolongan->nama_golongan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>

                            <div class="col-md-12">
                                <label for="status" >Status</label>
                                <input id="status" type="text" class="form-control" name="status" value="<?php echo e($tunjangan->status); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label for="jumlah_anak" >Jumlah Anak</label>
                                <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" value="<?php echo e($tunjangan->jumlah_anak); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label for="besaran_uang" >Besaran Uang</label>
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" value="<?php echo e($tunjangan->besaran_uang); ?>" autofocus>

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