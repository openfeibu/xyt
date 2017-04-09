<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class SignRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/sign', [
				'as'   => 'sign.index',
				'uses' => 'SignController@index',
			]);

			$router->resource('sign', 'SignController');
    	});
		
    }
}
