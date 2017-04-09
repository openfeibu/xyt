<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="" name="description" />
<meta content="" name="keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>象牙塔</title>
</head>
<link href="<?php echo e(asset('/build/dist/css/style.css')); ?>" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(elixir('dist/css/all.css')); ?>">
<script src="<?php echo e(asset('/build/dist/js/jquery-1.8.3.min.js')); ?>"></script>
<body>
<div class="all">
<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="head">
<a href="index.html" class="logo"><img src="<?php echo e(asset('/images/index/logo.jpg')); ?>" width="370" height="100" alt="" title="" /></a>

</div>

<div class="clear"></div>
<div class="b_m">
<div class="b_ma">
<img src="<?php echo e(asset('/images/index/img46.jpg')); ?>" width="600" height="342" alt="" />
</div>
<div class="b_mb">
<img src="<?php echo e(asset('/images/index/img47.jpg')); ?>" width="317" height="52" alt="" />
<form role="form" method="POST" action="/auth/login">
	<ul class="b_mba">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<?php if(Session::has('error')): ?>
			<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
		<?php endif; ?>
		<li><input type="login" class="b_mbb" placeholder="请输入手机或邮箱" style="background:url(<?php echo e(asset('/images/index/img48.jpg')); ?>) no-repeat;" name="login"  value="<?php echo e(Input::old('login')); ?>"/></li>
		<li><input type="password" class="b_mbb" name="password"  placeholder="请输入密码" style="background:url(<?php echo e(asset('/images/index/img49.jpg')); ?>) no-repeat;" /></li>
		<!--<li>
			<?php if(!$captcha_login_disabled): ?>
				<?php echo $__env->make('partials.captcha', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
		</li>-->
		<li><input type="checkbox"  name="remember" class="b_mbc" style="margin-top:15px;" /><span class="b_mbd">下次自动登录</span><a href="<?php echo e(route('user.forget_password')); ?>" class="b_mbe">忘记密码？</a></li>
		<li><input type="submit" class="b_mbf"  name="commit" value="<?php echo e(trans('forms.login')); ?>"  /></li>
		<li><a href="/auth/register">没有账号？<span class="green">免费注册!</span></a></li>
	</ul>
</form>
</div>
</div>

<?php echo $__env->make('footer.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>

    $(function(){
	    $(".close").click(function(){
	    	$(".alert").remove();
   	 	});
    });

</script>
</body>

</html>
