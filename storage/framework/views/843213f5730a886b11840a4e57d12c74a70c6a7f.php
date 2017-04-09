<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>象牙塔</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">   
</head>
<link href="<?php echo e(asset('/build/dist/css/style.css')); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo e(asset('/build/dist/css/bootstrap.min.css')); ?>" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/jquery-1.8.3.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/jquery.luara.0.0.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('/build/dist/js/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/build/dist/js/ajax.js')); ?>"></script>

        <script type="text/javascript">
            config = {
                'locale' : '<?php echo e(isset($user_locale) ? $user_locale : $site_locale); ?>',
                'current_user_id' : <?php echo e(Auth::user() ? Auth::user()->id : 'null'); ?>,
                'token' : '<?php echo e(csrf_token()); ?>',
                'emoj_cdn' : '<?php echo e(cdn()); ?>',
                'uploader_url' : '<?php echo e(route('upload_image')); ?>',
                'notification_url' : '<?php echo e(route('notification.count')); ?>',
               
            };
            var LOGIN_URL = "<?php echo e(route('auth.login')); ?>";
            var SITE_URL = '<?php echo e(config('app.url')); ?>';
  			var SPACE_VIDEO_PARAM_URL = "<?php echo e(route('space.videoParamUrl')); ?>";
  			var SPACE_STORE_URL = "<?php echo e(route('space.store')); ?>";
			var UPLOAD_URL= '<?php echo e(route('upload_image')); ?>';
			var LANG = new Array();
			var MID		  = '1';
			var UID		  = '1';
			var initNums  =  '140';
			var SYS_VERSION = '4.3.1'
			var UMEDITOR_HOME_URL = '<?php echo e(config('app.url')); ?>/js/static/um/';
			var _CP       = 'TS4_';
			var THEME_URL = '<?php echo e(config('app.url')); ?>';
			var SPACE_VIDEO_EXIST = "<?php echo e(route('space.video_exist')); ?>";
			var LIKE = "<?php echo e(route('like.index')); ?>";
			var ADD_DIGG_URL = "<?php echo e(route('space.add_digg')); ?>";
			var DEL_DIGG_URL = "<?php echo e(route('space.del_digg')); ?>";
			var COMMENT_RENDER_URL = "<?php echo e(route('comment.render')); ?>";
			var COMMENT_LIST_URL = "<?php echo e(route('comment.list')); ?>";
			var GET_SMILE_URL = "<?php echo e(route('space.smile')); ?>";
			var ADD_COMMNET_URL = "<?php echo e(route('comment.add')); ?>";
			var SPACE_MORE_URL = "<?php echo e(route('space.more')); ?>";
			var SHARE_SPACE_URL = "<?php echo e(route('share.index')); ?>";
			var ADD_SHARE_SPACE_URL = "<?php echo e(route('space.share_space')); ?>";
			var ADD_REPLY_URL = "<?php echo e(route('allReply.add_reply')); ?>";
			var REMOVE_SPACE_URL = "<?php echo e(route('space.remove')); ?>";
			var SPACE_RECOMMEND_URL = "<?php echo e(route('space.recommend')); ?>";
			var DELETE_COMMENT_URL = "<?php echo e(route('comment.remove')); ?>";
			var DELETE_REPLY_URL = "<?php echo e(route('allReply.remove')); ?>";
			var CHECK_EMAIL_URL = "<?php echo e(route('user.check_email')); ?>";
			var CHECK_REGISTER_URL = "<?php echo e(route('user.check_register')); ?>";
			var CHECK_REGISTER_PARAM_URL = "<?php echo e(route('user.check_register_param')); ?>";
			var LOAD_SCHOOL_URL = "<?php echo e(route('user.load_school')); ?>";
			var REPLY_REPLY_URL = "<?php echo e(route('allReply.reply_reply')); ?>";
			var ADD_WALL_REPLY_URL = "<?php echo e(route('wall.add_wall')); ?>";
			var Activity_Mobile_URL = "<?php echo e(route('user.activityMobile')); ?>";
			var CONVERT_CHECK_URL ="<?php echo e(route('pay.convert_check')); ?>"; 
			var SEND_HELLO_URL = "<?php echo e(route('gift.sendHello')); ?>";
			var SEND_GIFT_URL = "<?php echo e(route('gift.sendGift')); ?>";
			var USER_DETAIL_URL = "<?php echo e(route('user.detail')); ?>";
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        </script>

        <?php if($stylesheet): ?>
		<style type="text/css">
		<?php echo $stylesheet; ?>

		</style>
		<?php endif; ?>
<body>

	<div class="all">
		<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    	<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		<div id="pjax-container">
		    <?php echo $__env->yieldContent('content'); ?>
		</div>

		<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<!-- JavaScripts -->
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/ajax.js')); ?>"></script>
<script src="<?php echo e(asset('/build/dist/js/jquery.pjax.min.js')); ?>"></script>
<script>
    //$(document).pjax('a', '#pjax-container');
    //$(document).on("pjax:timeout", function(event) {
    //    // 阻止超时导致链接跳转事件发生
    //    event.preventDefault()
    //});
    $(function(){
	    $(".close").click(function(){
	    	$(".alert").remove();
   	 	});
    });
     $(document).ajaxError(function(event,xhr,settings,errorType){
		if(errorType == 'Unauthorized'){
			window.location.href= LOGIN_URL; 
		}
     });
;!function(){

	//加载扩展模块
	layer.config({
	    extend: "extend/layer.ext.js"
	});
}();
</script>
</body>
</html>