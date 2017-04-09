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
class AllReplyRoutes
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
            $router->get('/all_reply/create', [
                'as'   => 'allReply.create',
                'uses' => 'AllReplyController@create',
            ]);
			$router->post('/all_reply/addReply', [
                'as'   => 'allReply.add_reply',
                'uses' => 'AllReplyController@addReply',
            ]);
            $router->post('/all_reply/remove', [
                'as'   => 'allReply.remove',
                'uses' => 'AllReplyController@remove',
            ]);
            $router->get('/all_reply/reply_reply', [
                'as'   => 'allReply.reply_reply',
                'uses' => 'AllReplyController@reply_reply',
            ]);
		});
    }
}