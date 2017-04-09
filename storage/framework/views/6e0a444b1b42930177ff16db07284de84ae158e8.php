<!DOCTYPE html>
<html lang="<?php echo e(isset($user_locale) ? $user_locale : $site_locale); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="env" content="<?php echo e(app('env')); ?>">
    <meta name="token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-touch-icon-152x152.png">

    <title><?php echo e(isset($page_title) ? $page_title : $site_title); ?></title>

    <link rel="stylesheet" href="<?php echo e(elixir('dist/css/all.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    <script src="<?php echo e(elixir('dist/js/all.js')); ?>"></script>
    <script type="text/javascript">
        Hifone.Config = {
            'current_user_id' : <?php echo e(Auth::user() ? Auth::user()->id : 'null'); ?>,
            'token' : '<?php echo e(csrf_token()); ?>',
            'emoj_cdn' : '<?php echo e(cdn()); ?>',
            'uploader_url' : '<?php echo e(route('upload_image')); ?>',
            'notification_url' : '<?php echo e(route('notification.count')); ?>'
        };
    </script>
</head>

<body class="install" data-page="install">
    <div class="text-center">
        <img class="logo" height="80" src="/images/hifone-logo.png" alt="Hifone">
        <h4><?php echo e(trans('install.title')); ?></h4>
        <br>
    </div>
    <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
        <div class="steps">
            <div class="step active">
                <?php echo e(trans('install.env_check')); ?>

                <span></span>
            </div>
            <div class="step">
                <?php echo e(trans('install.env_setup')); ?>

                <span></span>
            </div>
            <div class="step">
                <?php echo e(trans('install.config_setup')); ?>

                <span></span>
            </div>
            <div class="step">
                <?php echo e(trans("install.admin_account")); ?>

                <span></span>
            </div>
            <div class="step">
                <?php echo e(trans("install.complete_install")); ?>

                <span></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <form class="form-horizontal" name="SetupForm" method="POST" id="install-form" role="form">
            <div class="steup block-0">
                <table class="bordered verifiers">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo e(trans("install.requirement")); ?></th>
                        <th><?php echo e(trans("install.password_qm")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $env_check; ?>

                </tbody>
                </table>
                <hr>
                <div class="form-group text-center">
                    <span <?php if(!$root_verifier->verify()): ?> disabled="disabled"  class="btn btn-default" <?php else: ?> class="wizard-next btn btn-success" <?php endif; ?> data-current-block="0" data-next-block="1" data-loading-text="<i class='fa fa-spinner'></i>">
                        <?php echo e(trans('install.next_step')); ?>

                    </span>
                </div>
            </div>
            <div class="step block-1 hidden">
                <fieldset>
                    <div class="form-group">
                        <label><?php echo e(trans('install.cache_driver')); ?></label>
                        <select name="env[cache_driver]" class="form-control" required>
                            <option disabled><?php echo e(trans('install.cache_driver')); ?></option>
                            <?php foreach($cache_drivers as $driver => $driverName): ?>
                            <option value="<?php echo e($driver); ?>" <?php echo e(Input::old('env.cache_driver') == $driver ? "selected" : null); ?>><?php echo e($driverName); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('env.cache_driver')): ?>
                        <span class="text-danger"><?php echo e($errors->first('env.cache_driver')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('install.session_driver')); ?></label>
                        <select name="env[session_driver]" class="form-control" required>
                            <option disabled><?php echo e(trans('install.session_driver')); ?></option>
                            <?php foreach($cache_drivers as $driver => $driverName): ?>
                            <option value="<?php echo e($driver); ?>" <?php echo e(Input::old('env.session_driver') == $driver ? "selected" : null); ?>><?php echo e($driverName); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('env.session_driver')): ?>
                        <span class="text-danger"><?php echo e($errors->first('env.session_driver')); ?></span>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <hr>
                <div class="form-group text-center">
                    <span class="wizard-next btn btn-info" data-current-block="1" data-next-block="0">
                            <?php echo e(trans('install.prev_step')); ?>

                    </span>
                    <span class="wizard-next btn btn-success" data-current-block="1" data-next-block="2" data-loading-text="<i class='fa fa-spinner'></i>">
                        <?php echo e(trans('install.next_step')); ?>

                    </span>
                </div>
            </div>
            <div class="step block-2 hidden">
                <fieldset>
                    <div class="form-group">
                        <label><?php echo e(trans('install.site_name')); ?></label>
                        <input type="text" name="settings[site_name]" class="form-control" placeholder="<?php echo e(trans('install.site_name')); ?>" value="<?php echo e(Input::old('settings.site_name', 'Hifone')); ?>" required>
                        <?php if($errors->has('settings.site_name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('settings.site_name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('install.site_domain')); ?></label>
                        <input type="text" name="settings[site_domain]" class="form-control" placeholder="<?php echo e(trans('install.site_domain')); ?>" value="<?php echo e(Input::old('settings.site_domain', url('/'))); ?>" required>
                        <?php if($errors->has('settings.site_domain')): ?>
                        <span class="text-danger"><?php echo e($errors->first('settings.site_domain')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo e(trans('install.site_locale')); ?></label>
                        <select name="settings[site_locale]" class="form-control" required>
                            <option value="">Select Language</option>
                            <?php foreach($langs as $lang => $name): ?>
                            <option value="<?php echo e($lang); ?>" <?php if(Input::old('settings.site_locale') == $lang || $user_language == $lang): ?> selected <?php endif; ?>>
                                <?php echo e($name); ?>

                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('settings.site_locale')): ?>
                        <span class="text-danger"><?php echo e($errors->first('settings.site_locale')); ?></span>
                        <?php endif; ?>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <span class="wizard-next btn btn-info" data-current-block="2" data-next-block="1">
                            <?php echo e(trans('install.prev_step')); ?>

                        </span>
                        <span class="wizard-next btn btn-success" data-current-block="2" data-next-block="3" data-loading-text="<i class='icon ion-load-c'></i>">
                            <?php echo e(trans('install.next_step')); ?>

                        </span>
                    </div>
                </fieldset>
            </div>
            <div class="step block-3 hidden">
                <fieldset>
                    <div class="form-group">
                        <label><?php echo e(trans("install.username")); ?></label>
                        <input type="text" name="user[username]" class="form-control" placeholder="<?php echo e(trans('install.username')); ?>" value="<?php echo e(Input::old('user.username', '')); ?>" required>
                        <?php if($errors->has('user.username')): ?>
                        <span class="text-danger"><?php echo e($errors->first('user.username')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans("install.email")); ?></label>
                        <input type="text" name="user[email]" class="form-control" placeholder="<?php echo e(trans('install.email')); ?>" value="<?php echo e(Input::old('user.email', '')); ?>" required>
                        <?php if($errors->has('user.email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('user.email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans("install.password")); ?></label>
                        <input type="password" name="user[password]" class="form-control password-strength" placeholder="<?php echo e(trans('install.password')); ?>" value="<?php echo e(Input::old('user.password', '')); ?>" required>
                        <div class="strengthify-wrapper"></div>
                        <?php if($errors->has('user.password')): ?>
                        <span class="text-danger"><?php echo e($errors->first('user.password')); ?></span>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <hr >
                <div class="form-group text-center">
                    <span class="wizard-next btn btn-info" data-current-block="3" data-next-block="2">
                        <?php echo e(trans('install.prev_step')); ?>

                    </span>
                    <span class="wizard-next btn btn-success" data-current-block="3" data-next-block="4" data-loading-text="<i class='icon ion-load-c'></i>">
                        <?php echo e(trans("install.complete_install")); ?>

                    </span>
                </div>
            </div>
            <div class="step block-4 hidden">
                <div class="install-success">
                    <i class="ion ion-checkmark-circled"></i>
                    <h3>
                        <?php echo e(trans("install.completed")); ?>

                    </h3>
                    <a href="/admin" class="btn btn-default">
                        <span><?php echo e(trans("install.finish_install")); ?></span>
                    </a>
                </div>
            </div>
        </form>
    </div>    
</body>
</html>