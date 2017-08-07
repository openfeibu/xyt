<?php

namespace Hifone\Http\Controllers;

use AltThree\Validator\ValidationException;
use Auth;
use Hifone\Commands\Append\AddAppendCommand;
use Hifone\Commands\Thread\AddThreadCommand;
use Hifone\Commands\Thread\RemoveThreadCommand;
use Hifone\Commands\Thread\UpdateThreadCommand;
use Hifone\Events\Thread\ThreadWasViewedEvent;
use Hifone\Events\Thread\ThreadAnonymousEvent;
use Hifone\Models\Node;
use Hifone\Models\Section;
use Hifone\Models\Thread;
use Hifone\Models\Reply;
use Hifone\Models\User;
use Hifone\Repositories\Criteria\Thread\BelongsToNode;
use Hifone\Repositories\Criteria\Thread\Filter;
use Hifone\Repositories\Criteria\Thread\Search;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Input;
use Redirect;
use DB;
use Hifone\Models\Sign;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Creates a new thread controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
        $this->title = '话题';

    }

    /**
     * Shows the threads view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $repository = app('repository');
        $repository->pushCriteria(new Filter(Input::query('filter')));
        $repository->pushCriteria(new Search(Input::query('q')));
        $threads = Thread::select(DB::raw('id,title'))
                         ->orderBy('id','desc')
                         ->limit(6)
                         ->get();
        $hot_threads = Thread::select(DB::raw('id,title'))
                         ->orderBy('reply_count','desc')
                         ->limit(6)
                         ->get();

		//获取获取分类信息
		foreach (Section::get() as $k=>$section){
			$node_all[$k] = Node::where('section_id',$section->id)->get();
			foreach($node_all[$k] as $kk=>$node){
				$thread_in_nodes[$kk] = Thread::where('node_id',$node->id)->whereNull('deleted_at')->get();
			}
		}

        return $this->view('threads.index')
					->withThreads($threads)
					->with('node_all',$node_all)
					->with('thread_in_nodes',$thread_in_nodes)
                    ->with('hot_threads',$hot_threads)
					->withSections(Section::orderBy('order')->get());
    }

    public function getNewThreads(){
        $new_threads = Thread::select(DB::raw('id,title'))
                         ->orderBy('id','desc')
                         ->limit(6)
                         ->get();
        return $new_threads;
    }

    public function getNewReplies(){
        $new_replies = Thread::select(DB::raw('threads.id,threads.title'))
                            ->leftJoin('replies','threads.id','=','thread_id')
                            ->orderBy('replies.created_at','desc')
                            ->groupBy('threads.id')
                            ->limit(6)
                            ->get();
        return $new_replies;
    }

    /**
     * Shows a thread in more detail.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function show(Thread $thread)
    {
        $this->breadcrumb->push([
                $thread->node->name => $thread->node->url,
                $thread->title      => $thread->url,
        ]);
        $user = User::findByUid($thread->user_id);

        if($thread->anonymous)
        {
            $user = app('userRepository')->handle_anonymous($user);
        }

        $replies = Reply::where('thread_id',$thread->id)->orderBy('id','desc')->get();

		$alls = DB::table('replies')
				->where('thread_id',$thread->id)
	            ->join('users', 'replies.user_id', '=', 'users.id')
	            ->select('replies.*', 'users.username','users.avatar_url',
						'users.work','users.school')
				->orderBy('id','desc')
	            ->paginate(15);

		foreach ($alls as $k=>$all) {
		  	if(!empty($all->reply_id))
		  	{
			  	$replies_reply[$k] = Reply::where('id',$all->reply_id)->first();
                $reply_user = User::findByUid($replies_reply[$k]->user_id);
                if($all->anonymous)
                {
                    $reply_user = app('userRepository')->handle_anonymous($reply_user);
                }
			  	$reply_user_id[$k] = $reply_user;
			  	$replies_content[$k] = Reply::where('reply_id',$all->reply_id)->first();
		  	}
		  	$all->body = parse_html($all->body);
            if($all->anonymous)
            {
                $all = app('userRepository')->handle_anonymous($all);
            }else{
                $all->link = route('user.home', [$all->user_id]);
            }
        }

        //var_dump($alls);exit;
		if(empty($reply_user_id)){
			$reply_user_id[0] = "";
		}
		if(empty($replies_reply)){
			$replies_reply[0] = "";
		}
		if(empty($replies_content)){
			$replies_content[0] = "";
		}


        $repository = app('repository');
        $repository->pushCriteria(new BelongsToNode($thread->node_id));
		$space = app('spaceRepository')->getSpace($thread->space_id);
        return $this->view('threads.show')
		            ->withUser($user)
		            ->withThread($thread)
		            ->withReplies($replies)
					->with('alls',$alls)
					->with('replies_reply',$replies_reply)
					->with('replies_content',$replies_content)
					->with('reply_user_id',$reply_user_id)
					->with('space',$space)
		            ->withNode($thread->node);
    }

    public function create()
    {
        $node = Node::find(Input::query('node_id'));
        $sections = Section::orderBy('order')->get();

        $this->breadcrumb->push(trans('hifone.threads.add'), route('thread.create'));

        return $this->view('threads.create_edit')
		            ->withSections($sections)
		            ->withNode($node);
    }


    public function store()
    {
        $threadData = Input::get('thread');
        $node_id = isset($threadData['node_id']) ? $threadData['node_id'] : null;
        $tags = isset($threadData['tags']) ? $threadData['tags'] : '';
        $user = User::findByUidOrFail(Auth::id());
        $anonymous = 0;
        $update = [];
        if(Input::get('anonymous'))
        {
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
            $user->update(['score' =>$score ]);
            $anonymous = 1;
            $update['anonymous'] = 1;
        }

        try {
            $thread = dispatch(new AddThreadCommand(
                $threadData['title'],
                $threadData['body'],
                Auth::user()->id,
                $node_id,
                $tags
            ));
        } catch (ValidationException $e) {
            return Redirect::route('thread.create')
		                ->withInput(Input::all())
		                ->withErrors($e->getMessageBag());
        }
        if(Input::get('anonymous'))
        {
            event(new ThreadAnonymousEvent($thread));
        }
		$space_id = app('spaceRepository')->syncToSpace('thread',  Auth::id(), $thread->id);
        $update['space_id'] = $space_id ;
		Thread::where('id',$thread->id)->update($update);

		app('taskRepository')->store('thread');

        return Redirect::route('thread.show', [$thread->id])
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    /**
     * Shows the edit thread view.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function edit(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);
        $sections = Section::orderBy('order')->get();

        $thread->body = $thread->body_original;

        return $this->view('threads.create_edit')
            ->withThread($thread)
            ->withSections($sections)
            ->withNode($thread->node);
    }

    /**
     * Creates a new append.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function append(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);

        $content = Input::get('content') ?: '';

        try {
            $append = dispatch(new AddAppendCommand(
                $thread->id,
                $content
            ));
        } catch (ValidationException $e) {
            return Redirect::route('thread.show', $thread->id)
                ->withInput(Input::all())
                ->withErrors($e->getMessageBag());
        }

        return Redirect::route('thread.show', $thread->id)
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    /**
     * Edit a thread.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Thread $thread)
    {
        $threadData = Input::get('thread');

        $this->needAuthorOrAdminPermission($thread->user_id);

        try {
            $thread = dispatch(new UpdateThreadCommand($thread, $threadData));
        } catch (ValidationException $e) {
            return Redirect::route('thread.edit', $thread->id)
                ->withInput(Input::all())
                ->withErrors($e->getMessageBag());
        }

        return Redirect::route('thread.show', $thread->id)
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    /**
     * Recommend a thread.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function recommend(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);

        $updateData = [
            'is_excellent' => !$thread->is_excellent,
        ];

        $thread = dispatch(new UpdateThreadCommand($thread, $updateData));

        return Redirect::route('thread.show', $thread->id)
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    /**
     * Pin a thread.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function pin(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);
        ($thread->order > 0) ? $thread->decrement('order', 1) : $thread->increment('order', 1);

        return Redirect::route('thread.show', $thread->id);
    }

    /**
     * Sink a thread.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function sink(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);
        ($thread->order >= 0) ? $thread->decrement('order', 1) : $thread->increment('order', 1);

        return Redirect::route('thread.show', $thread->id);
    }

    /**
     * Deletes a given thread.
     *
     * @param \Hifone\Models\Thread $thread
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Thread $thread)
    {
        $this->needAuthorOrAdminPermission($thread->user_id);

        dispatch(new RemoveThreadCommand($thread));

        return Redirect::route('thread.index')
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

	public function node_content(Node $node){
		$thread_two = Thread::select(DB::raw('threads.*,users.id as uid,users.avatar_url,users.username'))
								->leftJoin('users','threads.user_id','=','users.id')
								->where('node_id',$node->id)
								->orderBy('id','desc')
								->paginate(5);
		foreach ($thread_two as $k=>$thread_one) {
            $user = User::where('id',$thread_one->user_id)->first();
            if($thread_one->anonymous)
            {
                $thread_one->username = '匿名';
                $thread_one->avatar_url = '/images/noavatar/middle.jpg';
                $user = app('userRepository')->handle_anonymous($user);
            }
            $thread_user[$k] = $user;
			$reply_last_time[$k] = Reply::where('thread_id',$thread_one->id)->orderBy('id','desc')->first();
			$thread_last_reply_user[$k] = User::where('id',$thread_one->last_reply_user_id)->first();
			if(empty($thread_last_reply_user[$k])){
				$thread_last_reply_user[$k] = $thread_one;
			}
			if(empty($reply_last_time[$k])){
				$reply_last_time[$k] = $thread_one;
			}
        }

		$thread_top = DB::select('select count(*) as counts, user_id from threads group by user_id' );
		rsort($thread_top);
		for($i=0;$i<count($thread_top);$i++)
		{
			$thread_top3[$i] = $thread_top[$i];
			$thread_count_top[$i] = $thread_top3[$i]->counts;
			$user_top3[$i] = User::where('id',$thread_top3[$i]->user_id)->first();
		}

		$nodes = Node::orderBy('member_count','desc')->get();
        $sign_count = app(Sign::class)->where('user_id',Auth::id())->count();
        return $this->view('threads.node_content')
					->with('node',$node)
					->with('nodes',$nodes)
					->with('user_top3',$user_top3)
					->with('thread_count_top',$thread_count_top)
					->with('reply_last_time',$reply_last_time)
					->with('thread_last_reply_user',$thread_last_reply_user)
					->with('thread_two',$thread_two)
                    ->with('sign_count',$sign_count);
					//->with('thread_user',$thread_user)
	}

	public function get_node_thread(Request $request){
		/* 按照条件查看话题 */
        if($request->condition == "month"){
            $date_condition = date("Y-m-d H:i:s",strtotime("-1 month"));
        }elseif($request->condition == "week"){
            $date_condition = date("Y-m-d H:i:s",strtotime("-7 day"));
        }elseif($request->condition == "day"){
            $date_condition = date("Y-m-d H:i:s",strtotime("-1 day"));
        }else{
            $date_condition = 0;
        }

		$thread_two = Thread::select(DB::raw('threads.*,users.id as uid,users.avatar_url,users.username'))
								->leftJoin('users','threads.user_id','=','users.id')
								->where('threads.created_at','>',$date_condition)
                                ->where('threads.node_id',$request->node_id)
								->orderBy('id','desc')
								->skip(5 * $request->page - 5)
                                ->take(5)
                                ->get();
        $count = Thread::select(DB::raw('threads.id'))
                                ->where('threads.created_at','>',$date_condition)
                                ->where('threads.node_id',$request->node_id)
                                ->get();
        return $this->common($thread_two,count($count));

	}

    public function common($thread_two,$count){
        $reply_last_time[] = "";
        $thread_last_reply_user[] = "";
        foreach ($thread_two as $k=>$thread_one) {
            $thread_user[$k] = User::where('id',$thread_one->user_id)->first();
            $reply_last_time[$k] = Reply::where('thread_id',$thread_one->id)->orderBy('id','desc')->first();
            $thread_last_reply_user[$k] = User::where('id',$thread_one->last_reply_user_id)->first();
            if(empty($thread_last_reply_user[$k])){
                $thread_last_reply_user[$k] = $thread_one;
            }
            if(empty($reply_last_time[$k])){
                $reply_last_time[$k] = $thread_one;
            }
        }
        return [
            'reply_last_time' => $reply_last_time,
            'thread_last_reply_user' => $thread_last_reply_user,
            'thread_two' => $thread_two,
            'count' => $count
        ];
    }

    public function get_node_threadByNew(Request $request){
        $thread_two = Thread::select(DB::raw('threads.*,users.id as uid,users.avatar_url,users.username'))
                                ->leftJoin('users','threads.user_id','=','users.id')
                                ->where('threads.node_id',$request->node_id)
                                ->orderBy('id','desc')
                                ->skip(5 * $request->page - 5)
                                ->take(5)
                                ->get();
        $count = Thread::select(DB::raw('threads.id'))
                                ->where('threads.node_id',$request->node_id)
                                ->get();
        return $this->common($thread_two,count($count));
    }

    public function get_node_threadByHot(Request $request){
        $thread_two = Thread::select(DB::raw('threads.*,users.id as uid,users.avatar_url,users.username'))
                                ->leftJoin('users','threads.user_id','=','users.id')
                                ->where('threads.node_id',$request->node_id)
                                ->orderBy('threads.reply_count','desc')
                                ->skip(5 * $request->page - 5)
                                ->take(5)
                                ->get();
        $count = Thread::select(DB::raw('threads.id'))
                                ->where('threads.node_id',$request->node_id)
                                ->get();
        return $this->common($thread_two,count($count));
    }

    public function get_node_threadByGood(Request $request){
        $thread_two = Thread::select(DB::raw('threads.*,users.id as uid,users.avatar_url,users.username'))
                                ->leftJoin('users','threads.user_id','=','users.id')
                                ->where('threads.node_id',$request->node_id)
                                ->orderBy('threads.view_count','desc')
                                ->skip(5 * $request->page - 5)
                                ->take(5)
                                ->get();
        $count = Thread::select(DB::raw('threads.id'))
                                ->where('threads.node_id',$request->node_id)
                                ->get();
        return $this->common($thread_two,count($count));
    }

}
