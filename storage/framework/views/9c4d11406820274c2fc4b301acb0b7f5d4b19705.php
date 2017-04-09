<?php if($errors->any()): ?>
<?php echo $__env->make('partials._error', ['level' => 'danger', 'title' => Session::get('title'), 'message' => $errors->all(':message')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
<?php echo $__env->make('partials._error', ['level' => 'success', 'title' => Session::get('title'), 'message' => $message], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<?php echo $__env->make('partials._error', ['level' => 'warning', 'title' => Session::get('title'), 'message' => $message], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<?php echo $__env->make('partials._error', ['level' => 'info', 'title' => Session::get('title'), 'message' => $message], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>