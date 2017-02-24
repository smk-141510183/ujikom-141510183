<?php $__env->startSection('content'); ?>
        <div class="col-md-5 ">
                <div class="panel-heading"><h2>Registrasi</div>
                <?php echo Form
                ::model($pegawai,['method' => 'PATCH' , 'route'=> ['pegawai.update',$pegawai->id], 'enctype'=>'multipart/form-data'] ); ?>

                <div class="panel-body">
                            <div class="col-md-6">
                                <label for="name" >Nama Pegawai</label>
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($pegawai->user->name); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="email" >E-MAIL</label>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($pegawai->user->email); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            </div>

                             <div class="col-md-12">
                                <label >Type User</label>
                                   <select name="permission" class="col-md-12 form-control">
                                       <option>Admin</option>
                                       <option>HRD</option>
                                       <option>Bagian Administrasi</option>
                                       <option>Pegawai</option>
                                   </select>
                            </div>
                        
                </div>
                </div>

            
            <div class="col-md-4 ">
                <div class="panel-heading"><h2>Create Pegawai</div>
                    
                <div class="panel-body">

                            <div class="col-md-12">
                                <label for="nip" >NIP Pegawai</label>
                                <input id="nip" type="text" class="form-control" name="nip" value="<?php echo e($pegawai->nip); ?>" autofocus>

                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
                                    </span>
                            </div>

                        

                            <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="id_jabatan">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="id_golongan">
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datagolongan->id); ?>" ><?php echo e($datagolongan->nama_golongan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                    <input type="file" class="form-control" name="foto" autofocus>

                                    <?php if($errors->has('foto')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('foto')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                            <div class="col-md-12" >
                        </div>
                </div>  
                </div>

</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>