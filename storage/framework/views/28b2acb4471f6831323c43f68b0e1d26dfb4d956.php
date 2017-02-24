<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Lembur Pegawai</div>
                    
                <div class="panel-body">

                        <?php echo Form::model($lemburpegawai,['method'=>'PATCH','route'=>['lemburpegawai.update',$lemburpegawai->id]]); ?>

                            <div class="col-md-6">
                                 <label for="kode_lembur_id">Kode Lembur</label>
                                    <select class="col-md-6 form-control" name="kode_lembur_id">
                                        <?php $__currentLoopData = $kategorilembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategorilembur): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datakategorilembur->id); ?>" ><?php echo e($datakategorilembur->kode_lembur); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>
                            
                             <div class="col-md-6">
                                <label for="pegawai_id">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="pegawai_id">
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapegawai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datapegawai->id); ?>" ><?php echo e($datapegawai->User->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_jam">Jumlah Jam</label>
                                <input id="jumlah_jam" value="<?php echo e($lemburpegawai->jumlah_jam); ?>" type="text" class="form-control" name="jumlah_jam" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
                                    </span>
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