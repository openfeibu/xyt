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
class SpaceRoutes
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
            $router->get('/space/index', [
                'as'   => 'space.index',
                'uses' => 'SpaceController@index',
            ]);
            $router->post('/space/store',  [
                'as'   => 'space.store',
                'uses' => 'SpaceController@store',
            ]);
            $router->post('/space/videoParamUrl',  [
                'as'   => 'space.videoParamUrl',
                'uses' => 'SpaceController@videoParamUrl',
            ]);
            $router->post('/space/getSmile',  [
                'as'   => 'space.smile',
                'uses' => 'SpaceController@getSmile',
            ]);
            $router->post('/space/getEmoji',  [
                'as'   => 'space.emoji',
                'uses' => 'SpaceController@getEmoji',
            ]);
            $router->post('/space/video_exist',  [
                'as'   => 'space.video_exist',
                'uses' => 'SpaceController@video_exist',
            ]);
            $router->post('/space/add_digg',  [
                'as'   => 'space.add_digg',
                'uses' => 'DiggController@addDigg',
            ]);
            $router->post('/space/del_digg',  [
                'as'   => 'space.del_digg',
                'uses' => 'DiggController@delDigg',
            ]);
            $router->get('/space/loadmore/{loadId?}/{type?}/{feed_type?}/{feed_key?}/{fgid?}/{topic_id?}/{load_count?}/{gid?}',  [
                'as'   => 'space.more',
                'uses' => 'SpaceController@loadMore',
            ]);
            $router->post('/comment/render',  [
                'as'   => 'comment.render',
                'uses' => 'CommentController@render',
            ]);
            $router->post('/comment/getCommentList',  [
                'as'   => 'comment.list',
                'uses' => 'CommentController@getCommentList',
            ]);
            $router->post('/comment/addComment',  [
                'as'   => 'comment.add',
                'uses' => 'CommentController@addComment',
            ]);
            $router->post('/comment/remove', [
				'as'   => 'comment.remove',
				'uses' => 'CommentController@remove',
			]);
            $router->post('/space/shareSpace',  [
                'as'   => 'space.share_space',
                'uses' => 'SpaceController@shareSpace',
            ]);
           $router->post('/space/remove',  [
                'as'   => 'space.remove',
                'uses' => 'SpaceController@remove',
            ]);
            $router->post('/space/recommend',  [
                'as'   => 'space.recommend',
                'uses' => 'SpaceController@recommend',
            ]);
            $router->get('/space/multimageBox', [
                'as'   => 'space.multimageBox',
                'uses' => 'SpaceController@multimageBox',
            ]);
    	});

    }
}
