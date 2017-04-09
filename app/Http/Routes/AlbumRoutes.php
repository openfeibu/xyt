<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class AlbumRoutes
{
    public function map(Registrar $router)
    {
		$router->group(['middleware' => ['web', 'ready', 'localize']], function (Registrar $router) {
			$router->get('/album/u/{user_id}', [
				'as'   => 'album.album',
				'uses' => 'AlbumController@album',
			]);
			$router->get('/album/index', [
				'as'   => 'album.index',
				'uses' => 'AlbumController@index',
			]);
			$router->get('/album/store', [
				'as'   => 'album.store',
				'uses' => 'AlbumController@store',
			]);
			$router->get('/album/upload_common', [
				'as'   => 'album.upload_common',
				'uses' => 'AlbumController@uploadCommon',
			]);
			$router->get('/album/upload_batch', [
				'as'   => 'album.upload_batch',
				'uses' => 'AlbumController@uploadBath',
			]);
			$router->post('/album/upload_common_handle', [
				'as'   => 'album.upload_common_handle',
				'uses' => 'AlbumController@uploadCommonHandle',
			]);
			$router->post('/album/upload_batch_handle', [
				'as'   => 'album.upload_batch_handle',
				'uses' => 'AlbumController@uploadBathHandle',
			]);
			$router->post('/album/store', [
				'as'   => 'album.store',
				'uses' => 'AlbumController@store',
			]);
			$router->get('album_photos/{album_id}', [
				'as'   => 'album.album_photos',
				'uses' => 'AlbumController@album_photos',
			]);
			$router->get('album/show/{album_id}', [
				'as'   => 'album.show',
				'uses' => 'AlbumController@show',
			]);
			$router->get('/album/albumAjax', [
				'as'   => 'album.albumAjax',
				'uses' => 'AlbumController@albumAjax',
			]);
		});
	}
}