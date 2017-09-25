<?php

namespace Hifone\Services\Repository;

use DB;
use Log;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Task;
use Hifone\Models\Credit;
use Hifone\Models\TaskUser;
use Hifone\Events\Space\SpaceWasAddedEvent;
use Illuminate\Support\Facades\View;

class TaskRepository{

	public function getTasks ($user_id,$type = '')
	{
		if($type == 'finish'){
			$tasks = app(TaskUser::class)->join('tasks','tasks.id', '=','task_users.task_id')->where('task_users.user_id',$user_id)->orderBy('task_users.id','desc')->distinct('tasks.id')->groupBy('tasks.id','desc')->get();
			foreach ($tasks as $key => $task) {
				$time = strtotime(date('Y-m-d'));
				if(strtotime($task->created_at->format('Y-m-d')) !=  $time && $task->frequency == 1){
					unset($tasks[$key]);
				}
			}
			return $tasks;
		}else{
			$task_ids = app(TaskUser::class)->forUser($user_id)->distinct('task_id')->lists('task_id');
			if($task_ids){
				$task_ids = $task_ids->toArray();
			}
			foreach( $task_ids as $key => $task_id )
			{
				$task = $this->getTask($task_id,['frequency','id']);
				if($task->frequency == 1){
					$frequency_tag = Credit::generateFrequencyTag();
					$task_user = app(TaskUser::class)->where('task_id',$task->id)->where('frequency_tag',$frequency_tag)->first(['id']);
					if(!$task_user){
						$k = array_search($task->id, $task_ids);
						unset($task_ids[$k]);
					}
				}
			}
			return app(Task::class)->whereNotIn('id', $task_ids)->recent()->get();
		}
	}
	public function getTaskUsers ($task_id = '',$num = 18)
	{
		$task_users =  app(TaskUser::class);
		if($task_id){
			$task_users = $task_users->where('task_users.task_id',$task_id);
		}
		$task_users =  $task_users->select(DB::raw('task_users.user_id,task_users.created_at,users.avatar_url,users.username'))->orderBy('task_users.task_id','desc')->distinct('task_users.user_id')->leftJoin('tasks','tasks.id', '=','task_users.task_id')->join('users','task_users.user_id', '=','users.id')->orderBy('task_users.id','desc')->groupBy('task_users.user_id')->take($num)->get();
		$task_users =  app('userRepository')->handleUsers($task_users);
		return $task_users;
	}
	public function getTask ($id,$columns = ['*'])
	{
		$task = app(Task::class)->where('id',$id)->first($columns);
		return $task;
	}
	public function store ($name)
	{
		$task =app(Task::class)->where('name',$name)->first();
		$user = Auth::user();
		if (!$task || !$this->checkFrequency($task, $user)) {
            return false;
        }
		$score = $user->score + $task->score;
		$task_user =  TaskUser::create(['task_id' => $task->id,'user_id' => Auth::id(),
										'frequency_tag' => Credit::generateFrequencyTag(),
										'score' => $task->score]);

        app(User::class)->where('id',$user->id)->update(['score' => $score]);
        $task->increment('user_count',1);
		return $task_user;
	}
	protected function checkFrequency(Task $task, \Hifone\Models\User $user)
    {
        if ($task->frequency == Task::NO_LIMIT ) {
            return true;
        }

        $count = TaskUser::where('user_id', $user->id)->where('task_id', $task->id)->where(function ($query) use ($task) {
            if ($task->frequency == Task::DAILY) {
                $frequency_tag = Credit::generateFrequencyTag();

                return $query->where('frequency_tag', $frequency_tag);
            }
        })->count();
		if($task->frequency > 1 ){
			if($count >= $task->frequency){
				return false;
			}else{
				return true;
			}
		}

        return !$count;
    }
}
