<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class SearchRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/search', [
				'as'   => 'search.index',
				'uses' => 'SearchController@index',
			]);
			$router->get('/search/friend', [
				'as'   => 'search.friend',
				'uses' => 'SearchController@friend',
			]);
			$router->get('/search/city', [
				'as'   => 'search.city',
				'uses' => 'SearchController@city',
			]);
			$router->get('/search/townee', [
				'as'   => 'search.townee',
				'uses' => 'SearchController@townee',
			]);
			$router->get('/search/birthday', [
				'as'   => 'search.birthday',
				'uses' => 'SearchController@birthday',
			]);
			$router->get('/search/classmate', [
				'as'   => 'search.classmate',
				'uses' => 'SearchController@classmate',
			]);
			$router->get('/search/colleague', [
				'as'   => 'search.colleague',
				'uses' => 'SearchController@colleague',
			]);
			$router->get('/search/accurate', [
				'as'   => 'search.accurate',
				'uses' => 'SearchController@accurate',
			]);
			$router->get('/search/result/{page?}', [
				'as'   => 'search.result',
				'uses' => 'SearchController@result',
			]);
    	});
		
    }
}
