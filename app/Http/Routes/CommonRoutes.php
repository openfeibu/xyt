<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class CommonRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/sign', [
				'as'   => 'sign',
				'uses' => 'SignController@index',
			]);
			$router->post('/thread_report', [
				'as'   => 'thread.report',
				'uses' => 'ReportController@thread_report',
			]);
			$router->post('/reply_report', [
				'as'   => 'reply.report',
				'uses' => 'ReportController@reply_report',
			]);

			$router->post('gift/sendGift', [
				'as'   => 'gift.sendGift',
				'uses' => 'SendGiftController@sendGift',
			]);

			$router->post('gift/sendHello', [
				'as'   => 'gift.sendHello',
				'uses' => 'SendGiftController@sendHello',
			]);

			$router->post('report/nodeReport', [
				'as'   => 'report.nodeReport',
				'uses' => 'ReportController@node_report',
			]);

			$router->get('about/index', [
				'as'   => 'about.index',
				'uses' => 'AboutController@index',
			]);
			$router->get('about/show/{id}', [
				'as'   => 'about.show',
				'uses' => 'AboutController@show',
			]);
			$router->resource('sign', 'SignController');
    	});
		
    }
}
