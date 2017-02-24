<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>UJIKOM</title>

    <!-- Styles -->
    <link href="<?php echo e(url('/master/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(url('/master/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('/master/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo e(url('/master/vendor/morrisjs/morris.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('/master/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <link href="/sweetalert/sweetalert.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                        UJIKOM
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo e(url('/pegawai')); ?>">Pegawai</a></li>
                        <li><a href="<?php echo e(url('/jabatan')); ?>">Jabatan</a></li>
                        <li><a href="<?php echo e(url('/golongan')); ?>">Golongan</a></li>
                        <li><a href="<?php echo e(url('/kategorilembur')); ?>">K.Lembur</a></li>
                        <li><a href="<?php echo e(url('/lemburpegawai')); ?>">L.Pegawai</a></li>
                        <li><a href="<?php echo e(url('/tunjangan')); ?>">Tunjangan</a></li>
                        <li><a href="<?php echo e(url('/tunjanganpegawai')); ?>">Tunjangan Pegawai</a></li>
                        <li><a href="<?php echo e(url('/penggajian')); ?>">Penggajian</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/sweetalert/sweetalert.min.js"></script>
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
