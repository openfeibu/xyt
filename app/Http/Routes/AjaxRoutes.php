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
class AjaxRoutes
{
    /**
     * Define the ajax routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->group(['middleware' => ['web', 'ready', 'auth']], function (Registrar $router) {

            //下沉
            $router->post('thread/{thread}/sink', [
                'as'         => 'thread.sink',
                'middleware' => ['permission:manage_threads'],
                'uses'       => 'ThreadController@sink',
            ]);
             //推荐
            $router->post('thread/{thread}/recommend', [
                'as'         => 'thread.recommend',
                'middleware' => ['permission:manage_threads'],
                'uses'       => 'ThreadController@recommend',
            ]);
            //置顶
            $router->post('thread/{thread}/pin', [
                'as'         => 'thread.pin',
                'middleware' => ['permission:manage_threads'],
                'uses'       => 'ThreadController@pin',
            ]);
            //删除
            $router->delete('thread/{thread}/delete', [
                'as'         => 'thread.destroy',
                'middleware' => ['permission:manage_threads'],
                'uses'       => 'ThreadController@destroy',
            ]);
			$router->resource('thread', 'ThreadController');
			$router->get('thread/{node}/node_content', [
                'as'     => 'thread.node_content',
                'uses'   => 'ThreadController@node_content',
            ]);
			$router->get('thread/1/get_node_thread', [
                'as'     => 'thread.get_node_thread',
                'uses'   => 'ThreadController@get_node_thread',
            ]);
            $router->get('thread/1/get_node_threadByNew', [
                'as'     => 'thread.get_node_threadByNew',
                'uses'   => 'ThreadController@get_node_threadByNew',
            ]);
            $router->get('thread/1/get_node_threadByHot', [
                'as'     => 'thread.get_node_threadByHot',
                'uses'   => 'ThreadController@get_node_threadByHot',
            ]);
            $router->get('thread/1/get_node_threadByGood', [
                'as'     => 'thread.get_node_threadByGood',
                'uses'   => 'ThreadController@get_node_threadByGood',
            ]);


            $router->get('thread/1/getNewThreads', [
                'as'     => 'thread.getNewThreads',
                'uses'   => 'ThreadController@getNewThreads',
            ]);
            $router->get('thread/1/getNewReplies', [
                'as'     => 'thread.getNewReplies',
                'uses'   => 'ThreadController@getNewReplies',
            ]);


            $router->resource('like', 'LikeController');

			$router->get('like/thread', [
                'as'     => 'like.thread',
                'uses'   => 'LikeController@thread',
            ]);
			$router->get('like/reply', [
                'as'     => 'like.reply',
                'uses'   => 'LikeController@reply',
            ]);

			//关注活动
			$router->post('activity/follow', [
                'as'     => 'activity.follow',
                'uses'   => 'ActivityController@follow',
            ]);
            $router->post('activity/join', [
                'as'     => 'activity.join',
                'uses'   => 'ActivityController@join',
            ]);


            $router->post('/thread/{thread}/append', [
                'as'   => 'thread.append',
                'uses' => 'ThreadController@append',
            ]);

            $router->post('/follow/{thread}', [
                'as'     => 'follow.createOrDelete',
                'uses'   => 'FollowController@createOrDelete',
            ]);

            $router->post('/follow/user/{user}', [
                'as'     => 'follow.user',
                'uses'   => 'FollowController@createOrDeleteUser',
            ]);

            $router->delete('reply/{reply}/delete', [
                'as'     => 'reply.destroy',
                'uses'   => 'ReplyController@destroy',
            ]);

            $router->post('/favorite/{thread}', [
                'as'     => 'favorite.createOrDelete',
                'uses'   => 'FavoriteController@createOrDelete',
            ]);

            //获取通知数
            $router->get('/notification/count', [
                'as'     => 'notification.count',
                'uses'   => 'NotificationController@count',
            ]);

            $router->any('upload_image', [
                'as'     => 'upload_image',
                'uses'   => 'UploadController@uploadImage',
            ]);
			$router->any('upload_new_image', [
                'as'     => 'upload_new_image',
                'uses'   => 'UploadController@uploadNewImage',
            ]);
            $router->post('user/{user}/blocking', [
                'as'         => 'user.blocking',
                'middleware' => ['permission:manage_users'],
                'uses'       => 'UserController@blocking',
            ]);
            $router->post('/upload/save', [
                'as'     => 'upload.save',
                'uses'   => 'UploadController@save',
            ]);
            $router->get('gift', [
                'as'     => 'gift',
                'uses'   => 'SendGiftController@gift',
            ]);
            $router->get('hello', [
                'as'     => 'hello',
                'uses'   => 'SendGiftController@hello',
            ]);
            $router->get('card', [
                'as'     => 'card',
                'uses'   => 'CardController@getCard',
            ]);
            $router->post('/card/buyCard', [
                'as'     => 'card.buy_card',
                'uses'   => 'CardController@buyCard',
            ]);
        });
    }
}
