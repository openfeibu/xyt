<?php

namespace Hifone\Http\Controllers;

use DB;
use Mail;
use Auth;
use Input;
use Redirect;
use Hifone\Models\Task;
use Hifone\Models\TaskUser;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	
	public function __construct()
    {
	    parent::__construct();	    
        $this->middleware('auth');       
    }
    public function index ()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '我的认证' => ''        		
        ]);
        $tasks = app('taskRepository')->getTasks(Auth::id());
        $finish_tasks = app('taskRepository')->getTasks(Auth::id(),'finish');    
        $count = app(Task::class)->count();
        $schedule = round(count($finish_tasks)/$count * 100).'%';
        $task_users = app('taskRepository')->getTaskUsers();
    	return  $this->view('tasks.index')->with('tasks',$tasks)->with('schedule',$schedule)->with('task_users',$task_users);
    }
    public function finish ()
    {
	    $this->breadcrumb->push([
				'个人中心' => route('user.home',['uid'=>Auth::id()]),
                '我的认证' => ''        		
        ]);
        $finish_tasks = app('taskRepository')->getTasks(Auth::id(),'finish');
    	return  $this->view('tasks.finish')->with('finish_tasks',$finish_tasks);
    }
    public function show (Request $request)
    {
    	if(!isset($request->id) && $request->id != 1){
	    	return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors(['参数错误']);
    	}
    	app('taskRepository')->store('login');
    	return Redirect::route('task.finish');
    }
}