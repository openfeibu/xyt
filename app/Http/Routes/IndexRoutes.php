<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class IndexRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/sign', [
				'as'   => 'sign',
				'uses' => 'SignController@index',
			]);
			$router->get('/search', [
				'as'   => 'search.index',
				'uses' => 'SearchController@index',
			]);
			$router->get('/', [
				'as'   => 'index.index',
				'uses' => 'IndexController@index',
			]);
			$router->get('/home', [
				'as'   => 'home',
				'uses' => 'IndexController@index',
			]);
			$router->resource('index', 'IndexController');
			$router->resource('sign', 'SignController');
    	});
		
    }
}
