<!DOCTYPE html>
<html>
<head>
	<title>Gilacoding | CRUD Laravel 5.2 dengan Materializecss</title>
	<link rel="stylesheet" href="<?php echo e(asset('css/materialize.min.css')); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php $__env->startSection('css'); ?>

    <?php echo $__env->yieldSection(); ?>
</head>
<body>
<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<div class="container">
	<?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo e(asset('js/materialize.min.js')); ?>"></script>
<script type="text/javascript">
	(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>
</body>
</html>