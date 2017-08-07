<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Controllers;

use Auth;
use Cache;
use Hifone\Models\User;
use Hifone\Events\User\UserWasLoggedinEvent;
use Hifone\Services\Breadcrumb\Breadcrumb;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Zizaco\Entrust\EntrustFacade as Entrust;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $title;
    /**
     * @var Breadcrumb
     */
    protected $breadcrumb;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
	    Cache::flush();
	    $this->middleware('auth');
        $this->breadcrumb = new Breadcrumb();
        $this->title = '';

        if (Auth::check()) {
            $activeDate = app('session')->get('active_date');

            if (!$activeDate || $activeDate != date('Ymd')) {
                event(new UserWasLoggedinEvent(Auth::user()));
                app('session')->put('active_date', date('Ymd'));
                app(User::class)->where('id',Auth::id())->update(['last_login' => date('Y-m-d H:i:s')]);
            }
        }

    }

    /**
     * Renders view with breadcrumb.
     *
     * @param string|null $view
     * @param array       $data
     *
     * @return \Illuminate\View\View
     */
    protected function view($view = null, $data = [])
    {
        if (count($this->breadcrumb)) {
            $data['breadcrumb'] = $this->breadcrumb->render();
        }

        if (!request()->ajax()) {
            //
        }
        $data['title'] = $this->title;
        return View::make($view, $data);
    }

    public function needAuthorOrAdminPermission($author_id)
    {
        if (!Entrust::hasRole(['Founder', 'Admin']) && $author_id != Auth::id()) {
            throw new HttpException(401);
        }
    }
    public function needAdminPermission()
    {
        if (!Entrust::hasRole(['Founder', 'Admin'])) {
            throw new HttpException(401);
        }
    }
}
