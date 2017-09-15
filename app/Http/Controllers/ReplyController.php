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

use AltThree\Validator\ValidationException;
use Auth;
use Hifone\Commands\Reply\AddReplyCommand;
use Hifone\Commands\Reply\RemoveReplyCommand;
use Hifone\Models\Reply;
use Hifone\Models\Thread;
use Hifone\Models\User;
use Hifone\Models\Node;
use Illuminate\Http\Request;
use Hifone\Models\Notification;
use Input;
use Redirect;
use Illuminate\Support\Facades\Session;

class ReplyController extends Controller
{
    /**
     * Creates a new node.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
	function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }
    public function store(Request $request)
    {
		$login_session =Auth::user()->username;
		if(!empty($request->saytext2))
		{
			$thread = Thread::where('id',$request->thread_id)->first();
			$res = Thread::where('id', $request->thread_id)
					->update(['reply_count' => $thread->reply_count+1]);

			$user = User::findByUidOrFail(Auth::id());
			$node = Node::where('id',$thread->node_id)->first();

			$notification1 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->reply_id)
								->where('type' , 'thread_new_reply')
								->first();
			$notification2 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->reply_id)
								->where('type' , 'reply_like')
								->first();
			$notification3 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->reply_id)
								->where('type' , 'thread_like')
								->first();
            $anonymous = Input::get('anonymous') ? 1 : 0;
            if($anonymous){
                $anonymous_integral = config('system_config.anonymous_integral');
                if($user->score < $anonymous_integral){
                    $errors[] = '积分不足';
                }
                if(isset($errors)){
                    return  Redirect::back()
                               ->withInput(Input::all())
                               ->withErrors($errors);
                }
                $score = $user->score - $anonymous_integral;
                User::where('id',Auth::id())->update(['score' =>$score]);
            }
			if(!empty($request->reply_id))
			{
				$reply = Reply::where('id',$request->reply_id)->first();
				$user_reply = User::where('id', $reply->user_id)->first();
				$user_reply->update(['notification_count' => $user_reply->notification_count+1]);
				$new_reply = Reply::insert([
					[
						'body' => $request->saytext2,
						'body_original' => $request->saytext2,
						'user_id' => $user->id,
						'reply_id' => $request->reply_id,
						'thread_id' => $request->thread_id,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
                        'anonymous' => $anonymous,
					]
				]);

				Notification::insert([
					[
						'author_id' => $reply->user_id,
						'user_id' => $user->id,
						'object_id' => $request->reply_id,
						'object_type' => "Hifone\Models\Reply",
						'type' => "thread_new_reply",
						'body' => $reply->body,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);
			}
			else
			{
				$new_reply = Reply::insert([
					[
						'body' => $request->saytext2,
						'body_original' => $request->saytext2,
						'user_id' => $user->id,
						'thread_id' => $request->thread_id,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
                        'anonymous' => $anonymous,
					]
				]);
				Notification::insert([
					[
						'author_id' => $thread->user_id,
						'user_id' => $user->id,
						'object_id' => $request->thread_id,
						'object_type' => "Hifone\Models\Thread",
						'type' => "thread_new_reply",
						'body' => $thread->body,
						'anonymous' => $anonymous,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);

			//	$space_id = app('spaceRepository')->syncToSpace('thread_reply',  Auth::id(), $thread->id);

				//Reply::where('id',$new_reply->id)->update(['space_id' => $space_id]);
			}
			if(!$notification1&&!$notification2&&!$notification3){
				Node::where('id',$thread->node_id)-> update([
						'member_count' => $node->member_count+1,
						'reply_count' => $node->reply_count+1,
				]);
			}else{
				Node::where('id',$thread->node_id)-> update([
						'reply_count' => $node->reply_count+1,
				]);
			}
			Thread::where('id',$request->thread_id)->update(['last_reply_user_id' => $user->id]);

            return Redirect::route('thread.show', $request->thread_id)
            	->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));

		}
		else
		{
			return Redirect::route('thread.show', $request->thread_id)
            	->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
		}
    }

    public function destroy(Reply $reply)
    {
        $this->needAuthorOrAdminPermission($reply->user_id);

        dispatch(new RemoveReplyCommand($reply));

        return Redirect::route('thread.show', $reply->thread_id)
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }
}
