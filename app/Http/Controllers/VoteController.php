<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Vote;
use Hifone\Models\VoteUser;
use Hifone\Models\VoteOption;
use Illuminate\Http\Request;
use AltThree\Validator\ValidationException;

class VoteController extends Controller
{
	public function __construct()
    {
	    parent::__construct();
		$this->title = '投票';
        $this->middleware('auth');
    }
    public function index (Request $request)
    {
	    $type = isset($request->type) ? $request->type : 'new';
	    $votes = app('voteRepository')->votes($type);
    	return $this->view('vote.index')->with('votes',$votes)->with('type',$type);
    }
    public function create ()
    {
    	return $this->view('vote.create');
    }
    public function show (Request $request)
    {
	    $id = $request->id;
	    $vote = app('repository')->model(Vote::class)->find($id);
	    if(!$vote){
		    return Redirect::route('vote.index')
		    				->withInput(Input::all())
		                	->withErrors(['投票已被删除或不存在']);
	    }
	    $vote_options = $vote->options;
	    $user = User::findByUidOrFail($vote->user_id);
		foreach( $vote_options as $key => $vote_option )
		{
			if($vote->vote_count == 0){
				$vote_option->ratio = '0%';
			}else{
				$vote_option->ratio = round(($vote_option->vote_count/$vote->vote_count)*100).'%' ;
			}
		}

		$vote_user = VoteUser::where('user_id',Auth::id())->where('vote_id',$id)->first();

	    $this->breadcrumb->push([
				$user->username.'的主页' => route('user.home',['uid'=>$vote->user_id]),
                'TA的所有投票' => route('vote.user_vote',['user_id'=>$vote->user_id]),
                $vote->subject => '',

        ]);

       	$new_votes = app('voteRepository')->newVote(20);
        $hot_votes = app('voteRepository')->hotVote(20);

    	return $this->view('vote.show')->with('user',$user)
    							->with('vote',$vote)
    							->with('new_votes',$new_votes)
								->with('hot_votes',$hot_votes)
    							->with('vote_options',$vote_options)
    							->with('vote_user',$vote_user);
    }
    public function vote ()
    {
	    $vote_id =  Input::get('vote_id');
	    $vote = app('repository')->model(Vote::class)->findOrFail($vote_id);
	    $vote_user = VoteUser::where('user_id',Auth::id())->where('vote_id',$vote_id)->first();
	    if($vote_user){
		    return Redirect::back()
		    				->withInput(Input::all())
		                	->withErrors(['不能重复投票']);
	    }
	    $vote_options = $vote->options;
	    $vote_option_ids = Input::get('vote_option_id');
	    if(count($vote_option_ids) > $vote->maxchoice){
		    return Redirect::back()
		    				->withInput(Input::all())
		                	->withErrors(['最多只能选'.$vote->maxchoice]);
	    }
	    foreach( $vote_options as $key => $vote_option )
	    {
	    	$options[] = $vote_option->id;
	    }
    	foreach( $vote_option_ids as $key => $vote_option_id )
    	{
    		if(in_array($vote_option_id,$options)){
	    		$option_ids[] = $vote_option_id;
	    		VoteOption::where('id',$vote_option_id)->increment('vote_count');
	    		$vote->increment('vote_count');
    		}
    	}
    	VoteUser::create([
		 	'vote_id' => $vote_id,
		 	'user_id' => Auth::id(),
		 	'vote_option_id' => implode(',',$option_ids),
		]);
    	$vote->increment('user_count');
    	return Redirect::route('vote.show', [$vote_id])
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }

    public function userVoteList (Request $request)
    {
    	$user_votes = VoteUser::where('vote_id',$request->get('vote_id'))
						->orderBy('id','desc')
						->paginate(20)->appends(['vote_id'=>$request->get('vote_id')])	;
		if(!$user_votes){
			return [
				'html' => '没有更多投票了',
				'pageHtml' => '',
			];
		}
		foreach( $user_votes as $key => $user_vote )
		{
			$option_ids = explode(',',$user_vote->vote_option_id);
			$option_values = VoteOption::whereIn('id', $option_ids)->lists('value');
			$user_vote->option_values = $option_values;
			$user_vote->user = User::findByUidOrFail($user_vote->user_id);
		}
		$html = view("vote.user_vote_list")->with('user_votes',$user_votes)->__toString();
		$pageHtml = with(new \Hifone\Foundations\Pagination\CustomerPresenter($user_votes))->render();

		return [
			'html' => $html,
			'pageHtml' => $pageHtml,
		];
    }
    public function userVote (Request $request)
    {

    }
    public function store ()
    {
	    $validatorData = $voteData = Input::all();
	    $validatorData['is_repeat_option'] = count(array_filter($validatorData['option'])) == count(array_unique(array_filter($validatorData['option'])));
	    $validatorData['option_count'] = count(array_filter($validatorData['option']));
    	$rules = [
	    	'subject' => 'required|string',
	        'option' => 'required|array',
	        'option_count' => 'required|integer|min:2',
	        'maxchoice'  => 'required|between:1,20',
	        'expiration' => 'sometimes|required|timezone',
	        'sex' => 'required|in:0,1,2',
	        'noreply' => 'required|in:0,1',
	        'reward' => 'required|in:0,1',
	        'makefeed' => 'sometimes|required|in:1',
	        'is_repeat_option' => 'accepted',
	    ];
	    $messages = [
	    	'subject.required' => '主题格式不正确',
	    	'option_count.min' => '候选项至少两个',
	    	'is_repeat_option.accepted' => '候选项不能有重复'
	    ];
	    $validator = Validator::make($validatorData,$rules,$messages);
	    if($validator->errors()->first()){
		    return Redirect::route('vote.create')
		                ->withInput(Input::all())
		                ->withErrors($validator->errors());
	    }
	   // $voteData['option'] = serialize ($voteData['option']);
	    $voteData['user_id'] = Auth::id();

	    $vote = Vote::create($voteData);

		$options = array_filter($validatorData['option']);
	    foreach( $options as $key => $option )
	    {
	    	$vote_options[] = array('value' => $option,'vote_id' => $vote->id ,'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString());
	    }

	    VoteOption::insert($vote_options);

	    $space_id = app('spaceRepository')->syncToSpace('vote',  Auth::id(), $vote->id);

	    Vote::where('id',$vote->id)->update(['space_id' => $space_id ]);

	    return Redirect::route('vote.show', [$vote->id])
            ->withSuccess(sprintf('%s %s', trans('hifone.awesome'), trans('hifone.success')));
    }
}
