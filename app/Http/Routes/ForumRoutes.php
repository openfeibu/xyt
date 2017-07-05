<?php

/*
 * This file is part of 狗尾巴.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;


class ForumRoutes
{
	public function map (Registrar $router)
	{
    	$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
            $router->get('/', [
                'as'   => 'home',
                'uses' => 'HomeController@index',
            ]);

            $router->get('/excellent', [
                'as'   => 'excellent',
                'uses' => 'HomeController@excellent',
            ]);

            $router->get('/feed', [
                'as'   => 'feed',
                'uses' => 'HomeController@feed',
            ]);

            $router->get('/captcha', [
                'as'    => 'captcha',
                'uses'  => 'CaptchaController@index',
            ]);


            $router->get('/go/{slug}', [
                'as'   => 'go',
                'uses' => 'NodeController@showBySlug',
            ]);

             //通知中心
            $router->get('/notification', [
                'as'         => 'notification.index',
                'middleware' => 'auth',
                'uses'       => 'NotificationController@index',
            ]);
            $router->post('/notification/clean', [
                'as'         => 'notification.clean',
                'middleware' => 'auth',
                'uses'       => 'NotificationController@clean',
            ]);

            //积分
             $router->get('/credit', [
                'as'         => 'credit.index',
                'middleware' => 'auth',
                'uses'       => 'CreditController@index',
            ]);
			$router->get('/credit/rule', [
                'as'         => 'credit.rule',
                'middleware' => 'auth',
                'uses'       => 'CreditController@rule',
            ]);
            $router->get('/credit/role', [
                'as'         => 'credit.role',
                'middleware' => 'auth',
                'uses'       => 'CreditController@role',
            ]);
            $router->get('/credit/permission', [
                'as'         => 'credit.permission',
                'middleware' => 'auth',
                'uses'       => 'CreditController@permission',
            ]);
            $router->get('/task/index', [
                'as'         => 'task.index',
                'middleware' => 'auth',
                'uses'       => 'TaskController@index',
            ]);
            $router->get('/task/finish', [
                'as'         => 'task.finish',
                'middleware' => 'auth',
                'uses'       => 'TaskController@finish',
            ]);
            $router->get('/task/show/{id}', [
                'as'         => 'task.show',
                'middleware' => 'auth',
                'uses'       => 'TaskController@show',
            ]);
            $router->resource('node', 'NodeController');
            $router->resource('thread', 'ThreadController');
            $router->resource('pm', 'PmController');
            $router->resource('reply', 'ReplyController', ['only' => ['store']]);
            $router->resource('tag', 'TagController');
        });
	}
}
