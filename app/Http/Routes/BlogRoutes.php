<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class BlogRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/blog/create', [
				'as'   => 'blog.create',
				'uses' => 'BlogController@create',
			]);
			$router->get('/blog/index', [
				'as'   => 'blog.index',
				'uses' => 'BlogController@index',
			]);
			$router->post('/blog/store', [
				'as'   => 'blog.store',
				'uses' => 'BlogController@store',
			]);
			$router->get('/blog/show/{id}', [
				'as'   => 'blog.show',
				'uses' => 'BlogController@show',
			]);
            $router->post('/blog/digg', [
				'as'   => 'blog.digg',
				'uses' => 'DiggController@diggBlog',
			]);
		});
	}
}
