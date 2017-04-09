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
use Config;
use Hifone\Models\Credit;
use Hifone\Models\role;
use Hifone\Models\Credit\Rule as CreditRule;
use Illuminate\Support\Facades\View;

class CreditController extends Controller
{
    public function index()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''        		
        ]);
        $credits = Auth::user()->credits()->recent()->paginate(Config::get('setting.per_page'));
      	$role = app('userRepository')->getUserRole();
      	$user = Auth::user();
      	$roles = app('userRepository')->getRoles();
        return $this->view('credits.index')
        			->withCredits($credits)
            		->withUser($user)
            		->withRole($role)
            		->withRoles($roles);
    }
    public function rule ()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''        		
        ]);
    	$reward_rules = app(CreditRule::class)->where('reward', '>', 0)->orWhere('experience', '>',0)->get();
		$punish_rules = app(CreditRule::class)->where('reward', '<', 0)->orWhere('experience', '<',0)->get();
		return $this->view('credits.rule')
        			->with('reward_rules',$reward_rules)
        			->with('punish_rules',$punish_rules);
    }
    public function role ()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''        		
        ]);
    	$common_roles = app(Role::class)->where('special',0)->orderBy('max_experience','desc')->get();
    	$special_roles = app(Role::class)->whereIn('special',2)->get();
    	return $this->view('credits.role')
        			->with('common_roles',$common_roles)
        			->with('special_roles',$special_roles);
    }
    public function permission ()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '个人设置' => ''        		
        ]);
    	return $this->view('credits.permission');
    }
}
