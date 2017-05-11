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
class ActivityRoutes
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
            $router->get('/activity/index', [
                'as'   => 'activity.index',
                'uses' => 'ActivityController@index',
            ]);
            $router->get('/activity/create', [
                'as'   => 'activity.create',
                'uses' => 'ActivityController@create',
            ]);
            $router->get('/activity/show', [
                'as'   => 'activity.show',
                'uses' => 'ActivityController@show',
            ]);
            $router->post('/activity/store', [
                'as'   => 'activity.store',
                'uses' => 'ActivityController@store',
            ]);
            $router->get('/activity/u', [
                'as'   => 'activity.u',
                'uses' => 'ActivityController@user',
            ]);
            $router->get('/activity/summary', [
                'as'   => 'activity.summary',
                'uses' => 'ActivityController@summary',
            ]);
            $router->get('/activity/createSummary', [
                'as'   => 'activity.create_summary',
                'uses' => 'ActivityController@createSummary',
            ]);
            $router->post('/activity/storeSummary', [
                'as'   => 'activity.store_summary',
                'uses' => 'ActivityController@storeSummary',
            ]);
            $router->get('/activity/users', [
                'as'   => 'activity.users',
                'uses' => 'ActivityController@users',
            ]);
        });
    }
}
