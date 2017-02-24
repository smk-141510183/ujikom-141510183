<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Kategori Lembur</div>
                    
                <div class="panel-body">

                        <?php echo Form::model($kategorilembur,['method'=>'PATCH','route'=>['kategorilembur.update',$kategorilembur->id]]); ?>

                            <div class="col-md-6">
                                <label for="kode_lembur" >Kode Lembur</label>
                                <input id="kode_lembur" value="<?php echo e($kategorilembur->kode_lembur); ?>" type="text" class="form-control" name="kode_lembur" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="besaran_uang" >Besaran uang</label>
                                <input id="besaran_uang" value="<?php echo e($kategorilembur->besaran_uang); ?>" type="text" class="form-control" name="besaran_uang" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                 <label for="Jabatan">Nama Jabatan</label>
                                    <select class="col-md-6 form-control" name="id_jabatan">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>
                            
                             <div class="col-md-6">
                                <label for="Jabatan">Nama Golongan</label>
                                    <select class="col-md-6 form-control" name="id_golongan">
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datagolongan->id); ?>" ><?php echo e($datagolongan->nama_golongan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>

                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>