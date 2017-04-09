<?php

namespace Hifone\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the status page routes class.
 */
class PayRoutes
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
            $router->get('/pay', [
                'as'   => 'pay.index',
                'uses' => 'PayController@index',
            ]);
            $router->get('/pay/convertCheck', [
                'as'   => 'pay.convert_check',
                'uses' => 'PayController@convertCheck',
            ]);
            $router->post('/pay/convert', [
                'as'   => 'pay.convert',
                'uses' => 'PayController@convert',
            ]);
            $router->get('/pay/recharge', [
                'as'   => 'pay.recharge',
                'uses' => 'PayController@recharge',
            ]);
            $router->get('/pay/buy', [
                'as'   => 'pay.buy',
                'uses' => 'PayController@buy',
            ]);
            $router->post('/pay/rechargeStore', [
                'as'   => 'pay.recharge_store',
                'uses' => 'PayController@rechargeStore',
            ]);
            $router->post('/pay/aliNotify', [
                'as'   => 'pay.ali_notify',
                'uses' => 'PayController@aliNotify',
            ]);
            $router->post('/pay/buyStore', [
                'as'   => 'pay.buy_store',
                'uses' => 'PayController@buyStore',
            ]);
        });
    }
}