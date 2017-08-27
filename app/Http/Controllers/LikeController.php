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

use Hifone\Commands\Like\AddLikeCommand;
use Hifone\Models\Reply;
use Hifone\Models\Thread;
use Hifone\Models\User;
use Hifone\Models\Like;
use Hifone\Models\Node;
use Hifone\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Input;
use Auth;

class LikeController extends Controller
{
    public function reply(Request $request)
    {
    }
    public function index(Request $request)
    {
		$username = Auth::user();
		$login_session = $username->username;
		if($request->type == "Thread")
		{
			$user = User::where('username',$login_session)->first();
			$thread = Thread::where('id',$request->id)->first();
			$like = Like::where('user_id',$user->id)
					->where('likeable_id',$request->id)
					->where('likeable_type',"Hifone\Models\Thread")
					->first();
			$node = Node::where('id',$thread->node_id)->first();
			$notification1 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->id)
								->where('type' , 'thread_like')
								->where('object_type' , 'Hifone\Models\Thread')
								->first();
			$notification2 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->id)
								->where('type' , 'thread_new_reply')
								->where('object_type' , 'Hifone\Models\Thread')
								->first();
			$thread_count = $thread->like_count;
			if($like && $thread->like_count != 0)
			{
				$like->delete();
				Thread::where('id', $request->id)
					->update(['like_count' => $thread_count-1]);
				Notification::where('user_id',$user->id)
							->where('object_id',$request->id)
							->where('type','thread_like')
							->delete();
				echo $thread_count-1;die();
			}else
			{
				$member_count = $node->member_count;
				if(!$notification1 && !$notification2){
					Node::where('id',$thread->node_id) -> update(['member_count' => $member_count+1]);
				}
				Like::insert([
					[
						'user_id' => $user->id,
						'likeable_id' => $request->id,
						'likeable_type' => "Hifone\Models\Thread",
						'rating' => 1,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);
				Notification::insert([
					[
						'author_id' => $thread->user_id,
						'user_id' => $user->id,
						'object_id' => $request->id,
						'object_type' => "Hifone\Models\Thread",
						'type' => "thread_like",
						'body' => $thread->body,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);

				$res = Thread::where('id', $request->id)
					->update(['like_count' => $thread_count+1]);
				if($res)
				{
					$user = User::where('id', $thread->user_id)->first();
					$user ->update(['notification_count' => $user->notification_count+1]);
					echo $thread->like_count+1;
				}
			}
		}
		else
		{
			$user = User::where('username',$login_session)->first();
			$reply = Reply::where('id',$request->id)->first();
			$like = Like::where('user_id',$user->id)
					->where('likeable_id',$request->id)
					->where('likeable_type',"Hifone\Models\Reply")
					->first();
			$thread = Thread::where('id',$request->tid)->first();
			$node = Node::where('id',$thread->node_id)->first();
			$notification1 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->id)
								->where('type' , 'reply_like')
								->where('object_type' , 'Hifone\Models\Reply')
								->first();
			$notification2 = Notification::where('user_id' , $user->id)
								->where('object_id' , $request->id)
								->where('type' , 'thread_new_reply')
								->where('object_type' , 'Hifone\Models\Reply')
								->first();
			$like_count = $reply->like_count;
			if($like && $reply->like_count != 0)
			{
				$like->delete();
				Reply::where('id', $request->id)
					->update(['like_count' => $like_count-1]);
				Notification::where('user_id',$user->id)
							->where('object_id',$request->id)
							->where('type','thread_new_reply')
							->delete();
				echo $like_count-1;die();
			}else
			{
				$member_count = $node->member_count;
				if(!$notification1 && !$notification2){
					Node::where('id',$thread->node_id) -> update(['member_count' => $member_count+1]);
				}
				Like::insert([
					[
						'user_id' => $user->id,
						'likeable_id' => $request->id,
						'likeable_type' => "Hifone\Models\Reply",
						'rating' => 1,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);
				Notification::insert([
					[
						'author_id' => $reply->user_id,
						'user_id' => $user->id,
						'object_id' => $request->id,
						'object_type' => "Hifone\Models\Reply",
						'type' => "reply_like",
						'body' => $reply->body,
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
					]
				]);

				$res = Reply::where('id', $request->id)
					->update(['like_count' => $like_count+1]);
				if($res)
				{
					$user = User::where('id', $reply->user_id)->first();
					$user ->update(['notification_count' => $user->notification_count+1]);
					echo $reply->like_count+1;
				}
			}
		}
    }
}
