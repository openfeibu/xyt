<!DOCTYPE html>
<html lang="<?php echo e(isset($user_locale) ? $user_locale : $site_locale); ?>">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $__env->yieldContent('title'); ?> <?php echo e($site_name); ?><?php if($site_about): ?> - <?php echo e($site_about); ?><?php endif; ?></title>
        <meta name="keywords" content="Hifone,BBS,Forum,PHP,Laravel" />
        <meta name="author" content="The Hifone Team." />
        <meta name="description" content="<?php $__env->startSection('description'); ?> Hifone" />
        <meta name="env" content="<?php echo e(app('env')); ?>">
        <meta name="token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="<?php echo e(elixir('dist/css/all.css')); ?>">
        <link rel="shortcut icon" href="/images/favicon.png">
        <link rel="alternate" type="application/atom+xml" href="/feed" />
        <script src="<?php echo e(elixir('dist/js/all.js')); ?>"></script>
        <script type="text/javascript">
            Hifone.Config = {
                'locale' : '<?php echo e(isset($user_locale) ? $user_locale : $site_locale); ?>',
                'current_user_id' : <?php echo e(Auth::user() ? Auth::user()->id : 'null'); ?>,
                'token' : '<?php echo e(csrf_token()); ?>',
                'emoj_cdn' : '<?php echo e(cdn()); ?>',
                'uploader_url' : '<?php echo e(route('upload_image')); ?>',
                'notification_url' : '<?php echo e(route('notification.count')); ?>'
            };
        </script>

        <?php if($stylesheet): ?>
		<style type="text/css">
		<?php echo $stylesheet; ?>

		</style>
		<?php endif; ?>
    </head>
    <body class="forum" data-page="forum">
       <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div id="main" class="main-container container">
				<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

                <?php echo $__env->make('partials.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<?php echo $__env->yieldContent('content'); ?>

                <?php echo $__env->make('partials.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>

        <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</body>
</html>
