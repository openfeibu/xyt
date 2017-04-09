<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class UserRoutes
{
    /**
     * Define the status page routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
            $router->get('/user/{user}/replies', [
                'as'   => 'user.replies',
                'uses' => 'UserController@replies',
            ]);

            $router->get('/user/{user}/threads', [
                'as'   => 'user.threads',
                'uses' => 'UserController@threads',
            ]);

            $router->get('/user/{user}/favorites', [
                'as'   => 'user.favorites',
                'uses' => 'UserController@favorites',
            ]);

            $router->get('/user/{user}/credits', [
                'as'   => 'user.credits',
                'uses' => 'UserController@credits',
            ]);

            $router->get('/user/{user}/refresh_cache', [
                'as'   => 'user.refresh_cache',
                'uses' => 'UserController@refreshCache',
            ]);

            $router->post('/user/{user}/unbind', [
                'as'   => 'user.unbind_oauth',
                'uses' => 'UserController@unbind',
            ]);

            $router->get('/user/{user}/access_tokens', [
                'as'   => 'user.access_tokens',
                'uses' => 'UserController@accessTokens',
            ]);

            $router->get('/access_token/{token}/revoke', [
                'as'   => 'user.access_tokens.revoke',
                'uses' => 'UserController@revokeAccessToken',
            ]);

            $router->get('user/regenerate_login_token', [
                'as'   => 'user.regenerate_login_token',
                'uses' => 'UserController@regenerateLoginToken',
            ]);

            //上传avatar
            $router->post('/settings/update-avatar', [
                'as'   => 'user.avatarupdate',
                'uses' => 'UserController@avatarupdate',
            ]);
            //上传修改秘密
            $router->post('/settings/resetPassword', [
                'as'   => 'user.resetPassword',
                'uses' => 'UserController@resetPassword',
            ]);

            /*$router->get('/u/{username}', [
                'as'   => 'user.home',
                'uses' => 'UserController@showByUsername',
            ]);*/
            
			$router->get('/u/{uid}', [
                'as'   => 'user.home',
                'uses' => 'UserController@home',
            ]);
            
            $router->get('/user/city/{name}', [
                'as'   => 'user.city',
                'uses' => 'UserController@city',
            ]);
			$router->get('/user/checkEmail}', [
                'as'   => 'user.check_email',
                'uses' => 'UserController@checkEmail',
            ]);
            $router->get('/user/checkRegister}', [
                'as'   => 'user.check_register',
                'uses' => 'UserController@checkRegister',
            ]);
            $router->get('/user/checkRegisterParam}', [
                'as'   => 'user.check_register_param',
                'uses' => 'UserController@checkRegisterParam',
            ]);
            $router->get('user/loadSchool', [
                'as'   => 'user.load_school',
                'uses' => 'UserController@loadSchool',
            ]);
            $router->get('profile/base', [
                'as'   => 'profile.base',
                'uses' => 'UserController@base',
            ]);
            $router->post('profile/baseUpdate', [
                'as'   => 'profile.base_update',
                'uses' => 'UserController@baseUpdate',
            ]);
            $router->get('profile/standard', [
                'as'   => 'profile.standard',
                'uses' => 'UserController@standard',
            ]);
            $router->post('profile/standardUpdate', [
                'as'   => 'profile.standard_update',
                'uses' => 'UserController@standardUpdate',
            ]);
            $router->get('profile/dating', [
                'as'   => 'profile.dating',
                'uses' => 'UserController@dating',
            ]);
            $router->post('profile/datingUpdate', [
                'as'   => 'profile.dating_update',
                'uses' => 'UserController@datingUpdate',
            ]);
            $router->get('profile/detail', [
                'as'   => 'profile.detail',
                'uses' => 'UserController@detail',
            ]);
            $router->post('profile/detailUpdate', [
                'as'   => 'profile.detail_update',
                'uses' => 'UserController@detailUpdate',
            ]);
            $router->get('profile/happy', [
                'as'   => 'profile.happy',
                'uses' => 'UserController@happy',
            ]);
            $router->post('profile/happyUpdate', [
                'as'   => 'profile.happy_update',
                'uses' => 'UserController@happyUpdate',
            ]);
             $router->get('setting/avatar', [
                'as'   => 'setting.avatar',
                'uses' => 'UserController@avatar',
            ]);
            $router->get('user/spaces', [
                'as'   => 'user.spaces',
                'uses' => 'UserController@spaces',
            ]);
            $router->get('identify/mobile', [
                'as'   => 'identify.mobile',
                'uses' => 'UserController@identifyMobile',
            ]);
            $router->get('identify/email', [
                'as'   => 'identify.email',
                'uses' => 'UserController@identifyEmail',
            ]);
            $router->post('identify/activityEmail', [
                'as'   => 'identify.activity_email',
                'uses' => 'UserController@activityEmail',
            ]);
            $router->get('identify/validateEmail', [
                'as'   => 'identify.validate_email',
                'uses' => 'UserController@validateEmail',
            ]);
            $router->get('identify/name', [
                'as'   => 'identify.name',
                'uses' => 'UserController@identifyName',
            ]);
            $router->post('identify/nameStore', [
                'as'   => 'identify.nameStore',
                'uses' => 'UserController@identifyNameStore',
            ]);
            $router->get('identify/education', [
                'as'   => 'identify.education',
                'uses' => 'UserController@identifyEducation',
            ]);
            $router->post('identify/educationStore', [
                'as'   => 'identify.educationStore',
                'uses' => 'UserController@identifyEducationStore',
            ]);
            $router->get('wall/wall', [
                'as'   => 'wall.wall',
                'uses' => 'WallController@wall',
            ]);
            $router->post('wall/addWall', [
                'as'   => 'wall.add_wall',
                'uses' => 'WallController@addWall',
            ]);
            $router->get('wall/reply_reply', [
                'as'   => 'wall.reply_reply',
                'uses' => 'WallController@reply_reply',
            ]);
            $router->get('user/dynamic', [
                'as'   => 'user.dynamic',
                'uses' => 'UserController@dynamic',
            ]);
            $router->get('user/rank', [
                'as'   => 'user.rank',
                'uses' => 'UserController@rank',
            ]);
            $router->get('user/star', [
                'as'   => 'user.star',
                'uses' => 'UserController@star',
            ]);
            $router->post('user/activityEmail', [
                'as'   => 'user.activityEmail',
                'uses' => 'UserController@activityEmail',
            ]);
            $router->get('user/activityMobile', [
                'as'   => 'user.activityMobile',
                'uses' => 'UserController@activityMobile',
            ]);
            $router->post('user/validateMobile', [
                'as'   => 'user.validateMobile',
                'uses' => 'UserController@validateMobile',
            ]);
            $router->get('user/registerMobile', [
                'as'   => 'user.register_mobile',
                'uses' => 'UserController@registerMobile',
            ]);
            $router->post('user/registerValidateMobile', [
                'as'   => 'user.register_validate_mobile',
                'uses' => 'UserController@registerValidateMobile',
            ]);
            $router->get('user/birthUsers', [
                'as'   => 'user.birth_users',
                'uses' => 'UserController@birthUsers',
            ]);
            $router->get('user/more', [
                'as'   => 'user.more',
                'uses' => 'UserController@more',
            ]);
            $router->get('user/detail', [
                'as'   => 'user.detail',
                'uses' => 'UserController@userDetail',
            ]);
            $router->get('user/weekstar',[
				'as' 	=> 'user.weekstar',
				'uses' => 'UserController@weekstar',
            ]);
            $router->get('user/registerAvatar', [
                'as'   => 'user.register_avatar',
                'uses' => 'UserController@registerAvatar',
            ]);
            $router->get('user/forgetPassword',[
				'as' 	=> 'user.forget_password',
				'uses' => 'UserController@forgetPassword',
            ]);
            $router->post('user/forgetPassword',[
				'as' 	=> 'user.forget_password_post',
				'uses' => 'UserController@forgetPassword',
            ]);
            $router->get('user/forgetPasswordMobile',[
				'as' 	=> 'user.forget_password_mobile',
				'uses' => 'UserController@forgetPasswordMobile',
            ]);
            $router->post('user/forgetPasswordMobileNext',[
				'as' 	=> 'user.forget_password_mobile_next',
				'uses' => 'UserController@forgetPasswordMobileNext',
            ]);
            $router->get('user/forgetPasswordEmailNext',[
				'as' 	=> 'user.forget_password_email_next',
				'uses' => 'UserController@forgetPasswordEmailNext',
            ]);
            $router->post('user/forgetPasswordNextSubmit',[
				'as' 	=> 'user.forget_password_next_submit',
				'uses' => 'UserController@forgetPasswordNextSubmit',
            ]);
            $router->get('user/follow',[
            	'as' 	=> 'user.follow',
				'uses' => 'UserController@follow',
            ]);
            $router->post('user/follow',[
            	'as' 	=> 'user.follow_submit',
				'uses' => 'UserController@followSubmit',
            ]);
            $router->resource('user', 'UserController');
           
        });
    }
}
