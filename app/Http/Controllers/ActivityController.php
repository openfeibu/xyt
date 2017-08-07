<?php
namespace Hifone\Http\Controllers;

use DB;
use Log;
use Auth;
use Input;
use Excel;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Models\User;
use Hifone\Models\Summary;
use Hifone\Models\Activity;
use Hifone\Models\ActivityBanned;
use Hifone\Models\ActivityCategory;
use Hifone\Models\Area;
use Hifone\Models\Activity_actors;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActivityController extends Controller
{
	public function __construct()
    {
         parent::__construct();
		 $this->title = '活动';
    }
    public function index(Request $request)
    {
	    $province_id = isset($request->province_id) ? $request->province_id : '';
	    $cat_id = isset($request->cat_id) ? $request->cat_id : '';
	    $type = isset($request->type) ? $request->type : 'all';
	    $activities = app(Activity::class);
	    if($province_id){
		    $activities = $activities->where('province',$province_id);
	    }
	    if($cat_id){
		    $activities = $activities->where('cate_pid',$cat_id);
	    }
	    switch ($type)
	    {
	    	case 'recommend':
	    		$activities = $activities->where('is_recommend',1);
	    		break;
	    	default:
	    		break;
	    }
		$activities = $activities->recent()->paginate(10);
		$provinces = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTopCats();
		$cats = app('categoryTreeRepository')->setTable('activity_categories',app(ActivityCategory::class))->getTopCats();
		foreach( $activities as $key => $activity )
		{
			$city = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->city);
			$province = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->province);
			$activity->location = $province . ' ' . $city . ' ' . $activity->location;
		}
		return $this->view('activitys.index')
					->with('provinces',$provinces)
					->with('province_id',$province_id)
					->with('cat_id',$cat_id)
					->with('cats',$cats)
					->with('type',$type)
					->with('activities',$activities);
    }
	public function user(Request $request)
	{
		$province_id = isset($request->province_id) ? $request->province_id : '';
	    $cat_id = isset($request->cat_id) ? $request->cat_id : '';
	    $type = isset($request->type) ? $request->type : 'all';
	    $activities = app('repository')->model(Activity_actors::class)->where('activity_actors.user_id',Auth::id())->groupby('activity_actors.activity_id')->distinct('activity_actors.activity_id');
	    switch($type)
	    {
	    	case 'join':
	    		$activities = $activities->where('activity_actors.actor_type','join');
	    		break;
	    	case 'follow':
	    		$activities = $activities->where('activity_actors.actor_type','follow');
	    		break;
	    	default:
	    		break;
	    }
		$activities->leftJoin('activities', 'activities.id', '=', 'activity_actors.activity_id');
	    if($province_id){
		    $activities = $activities->where('activities.province',$province_id);
	    }
	    if($cat_id){
		    $activities = $activities->where('activities.cate_pid',$cat_id);
	    }
	    $activities = $activities->paginate(10);
		$provinces = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTopCats();
		$cats = app('categoryTreeRepository')->setTable('activity_categories',app(ActivityCategory::class))->getTopCats();
		foreach( $activities as $key => $activity )
		{
			$city = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->city);
			$province = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->province);
			$activity->location = $province . ' ' . $city . ' ' . $activity->location;
		}

		return $this->view('activitys.user_index')
					->with('provinces',$provinces)
					->with('province_id',$province_id)
					->with('cat_id',$cat_id)
					->with('cats',$cats)
					->with('type',$type)
					->with('activities',$activities);
	}
	public function create()
	{
		return $this->view('activitys.create');
	}
	public function store()
	{
		$ActivityData = Input::all();
	    $rules = [
	    	'name' => 'required',
	    	'location' => 'required',
			'city' => 'required|integer|min:1|exists:areas,id',
			'cate_id' => 'required|numeric|min:1',
			'begin_time' => 'required',
			'close_time' => 'required',
			'deadline' => 'required',
			'exittime' => 'required',
			'number_count' => 'required|numeric|between:3,300',
			'payboy' => 'required|numeric',
			'paygirl' => 'required|numeric',
			//'pay' => 'required|array|in:1,2,3',
			'mobile' => 'required',
			'poster' => 'required',
			'body' => 'required',
	    ];
	    $message = [
	    	'name.required' => '活动名称不能为空',
	    	'location.required' => '活动地点不能为空',
			'city.min' => '活动城市必填',
	    	'city.exists' => '不存在该城市',
			'cate_id.required' => '请选择活动分类',
			'cate_id.min' => '请选择活动分类',
			'begin_time.required' => '活动开始时间不能为空',
			'close_time.required' => '活动结束时间不能为空',
			'deadline.required' => '报名截止时间不能为空',
			'exittime.required' => '退出截止时间不能为空',
			'number_count.required' => '活动人数不符合要求',
			'number_count.numeric' => '活动人数不符合要求',
			'number_count.between' => '活动人数必须在 3 到 300 之间',
			'payboy.required' => '活动费用不符合要求',
			'paygirl.required' => '活动费用不符合要求',
			'payboy.numeric' => '活动费用不符合要求',
			'paygirl.numeric' => '活动费用不符合要求',
			//'pay.required' => '未选择支付方式',
			//'pay.in' => '支付方式不存在',
			'mobile.required' => '手机号码不能为空',
			'poster.required' => '未选择活动海报',
			'body.required' => '活动详情不能为空',
	    ];
	    $ActivityData['pay'] = ['0'];
	    $validator = Validator::make($ActivityData,$rules,$message);
	    if($validator->errors()->first()){
		    return  Redirect::back()
		    				->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$errors = array();
		if($ActivityData['begin_time'] < Carbon::now()->toDateTimeString() ){
			$errors[] = "活动开始时间不能小于当前时间";
		}
		if($ActivityData['begin_time'] > $ActivityData['close_time']){
			$errors[] = "活动开始时间不能大于活动结束时间";
		}
		/*if($ActivityData['deadline'] > $ActivityData['close_time']){
			$errors[] = "报名截止时间不能大于活动结束时间";
		}
		if($ActivityData['deadline'] < $ActivityData['begin_time']){
			$errors[] = "报名截止时间不能小于活动开始时间";
		}
		if($ActivityData['deadline'] < $ActivityData['begin_time']){
			$errors[] = "退出截止时间不能小于活动开始时间";
		}
		if($ActivityData['deadline'] > $ActivityData['close_time']){
			$errors[] = "退出截止时间不能大于活动结束时间";
		}*/
		if(count($errors)){
			return  Redirect::back()
		    				->withInput(Input::all())
			                ->withErrors($errors);
		}
		$file = Input::file('poster');
		$folderName = '/uploads/activity/'.'user_id_'.Auth::user()->id;
		$data = app('imageService')->uploadImage($file,$folderName);
		if($data['code'] != 200){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($data['error']);
		}
		$ActivityData['poster'] = $data['filename'];
		$ActivityData['pay'] = implode(',',$ActivityData['pay']);
		$ActivityData['user_id'] = Auth::id();
		//var_dump($ActivityData);exit;
		$activity = Activity::create($ActivityData);

		$activity_actors = new Activity_actors;
		$activity_actors->activity_id = $activity->id;
		$activity_actors->user_id = Auth::id();
		$activity_actors->actor_type = "create";
		$activity_actors->save();

		if(isset($ActivityData['makefeed']) && $ActivityData['makefeed']){
	    	$space_id = app('spaceRepository')->syncToSpace('activity',  Auth::id(), $activity->id);
	    	Activity::where('id',$activity->id)->update(['space_id' => $space_id ]);
    	}
		return Redirect::route('activity.index')
                ->withSuccess('创建活动成功');
	}
	public function show(Request $request){
		$login_user = Auth::user();
		$activity = Activity::select(['activities.*','activity_categories.title as cat_title '])->join('activity_categories','activity_categories.id','=','activities.cate_id')->where('activities.id',$request->id)->first();
		//$activity = Activity::where('id',$request->id)->first();
		$city = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->city);
		$province = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getTitle($activity->province);
		$activity->location = $province . ' ' . $city . ' ' . $activity->location;

		Activity::where('id',$request->id)->increment('view_count');
		$user = User::where('id',$activity->user_id)->first();
		$activity_joins = app('activityRepository')->getActivityJoins($request->id);
		$activity_follows = app('activityRepository')->getActivityFollows($request->id);

		$summary = Summary::where('activity_id',$activity->id)->first();

		$summaries = app('activityRepository')->summaries();
		$activity_join = Activity_actors::where('activity_id',$request->id)
										->where('user_id',Auth::id())
										->where('actor_type','join')
										->first();
		$activity_follow = Activity_actors::where('activity_id',$request->id)
										->where('user_id',Auth::id())
										->where('actor_type','follow')
										->first();

		$activity_join_status = $activity_join ? 1 : 0;
		$activity_follow_stauts = $activity_follow ? 1 : 0;
		$activity_join_status_desc = $activity_join ? '取消报名' : '立即报名';
		$activity_follow_stauts_desc = $activity_follow ? '取消关注' : '关注';
		$activity->deadline_desc = handle_activity_time($activity,$activity_join_status) ;
		$join_count = Activity_actors::where('activity_actors.actor_type','join')->where('activity_id',$activity->id)->count();
		$follow_count = Activity_actors::where('activity_actors.actor_type','follow')->where('activity_id',$activity->id)->count();

		return $this->view('activitys.content')
					->with('activity',$activity)
					->with('activity_joins',$activity_joins)
					->with('activity_follows',$activity_follows)
					->with('login_user',$login_user)
					->with('summary',$summary)
					->with('summaries',$summaries)
					->with('user',$user)
					->with('join_count',$join_count)
					->with('follow_count',$follow_count)
					->with('activity_join_status_desc',$activity_join_status_desc)
					->with('activity_follow_stauts_desc',$activity_follow_stauts_desc);
	}

	public function follow(Request $request){
		$activity_actors = Activity_actors::where('activity_id',$request->activity_id)
										->where('user_id',$request->user_id)
										->where('actor_type','follow')
										->first();
		if(!empty($activity_actors)){
			$activity_actors->delete();
			return [
				'code' => 200,
				'status' => 0,
				'msg' => '取消关注成功',
			];
		}else{
			try{
				DB::beginTransaction();
				$activity_actors = new Activity_actors;
				$activity_actors->activity_id = $request->activity_id;
				$activity_actors->user_id = $request->user_id;
				$activity_actors->actor_type = "follow";
				$activity_actors->save();
				DB::commit();
			}catch (Exception $e){
				DB::rollBack();
				return [
					'code' => 201,
					'msg' => '操作失败',
				];
			}
			return [
				'code' => 200,
				'status' => 1,
				'msg' => '关注成功',
			];
		}
	}
	public function join(Request $request){
		$activity = Activity::where('id',$request->activity_id)->first();
		$user = Auth::user();
		$activity_joiner = Activity_actors::where('activity_id',$request->activity_id)
										->where('user_id',Auth::id())
										->where('actor_type','join')
										->first();
		$activity_join_status = $activity_joiner ? 0 : 1;
		$desc = handle_activity_time($activity,$activity_join_status) ;
		if(!empty($activity_joiner)){
			$activity_joiner->delete();
			return [
				'code' => 200,
				'status' => 0,
				'desc' => $desc,
				'msg' => '取消报名成功',
			];
		}else{
			$money = 0;
			if($user->sex == 1)
			{
				$money = $activity->payboy;
			}else{
				$money = $activity->paygirl;
			}
			if(Auth::user()->activity_banned == 1)
			{
				return [
					'code' => 202,
					'msg' => '黑名单',
				];
			}

			try{
				$out_trade_no = buildOutTradeNo();
				DB::beginTransaction();
				$activity_actors = new Activity_actors;
				$activity_actors->activity_id = $request->activity_id;
				$activity_actors->user_id = Auth::id();
				$activity_actors->actor_type = "join";
				$activity_actors->pay_id = $request->pay_id;
				$activity_actors->pay_status = 0;
				$activity_actors->out_trade_no = $out_trade_no;
				$activity_actors->money = $money;
				$activity_actors->payment = trans('hifone.pay_id.'.$request->pay_id);
				$activity_actors->save();
				DB::commit();

			}catch (Exception $e){
				DB::rollBack();
				return [
					'code' => 201,
					'msg' => '报名失败',
				];
			}
			switch ($request->pay_id) {
				case '1':
					// 创建支付单。
					$alipay = app('alipay.web');
					$alipay->setOutTradeNo($out_trade_no);
					$alipay->setTotalFee($money);
					$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
					$alipay->setSubject('单号：'.$out_trade_no);
					$alipay->setBody('单号：'.$out_trade_no);

				  //  $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

					// 跳转到支付页面。
					return [
						'code' => 210,
						'status' => 1,
						'url' => $alipay->getPayLink(),
					];
					break;

				default:
					# code...
					break;
			}
			return [
				'code' => 200,
				'status' => 1,
				'desc' => $desc,
				'msg' => '报名成功',
			];
		}
	}
	public function summary (Request $request)
	{
		$errors = [];
		if(!isset($request->activity_id)){
			$errors[] = '缺少参数';
		}
		$activity = Activity::where('id',$request->activity_id)->first();
		if(!$activity){
			$errors[] = '活动不存在';
		}
		$summary = Summary::where('activity_id',$request->activity_id)->first();
		if(!$summary){
			$errors[] = '内容不存在';
		}
		if(count($errors)){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($errors);
		}
		//var_dump($activity);
		$this->breadcrumb->push([
                $activity->name => route('activity.show',['id'=>$activity->id]),
                $summary->title => '',
        ]);
		return $this->view('activitys.summary')->with('activity',$activity)->with('summary',$summary);
	}
	public function createSummary (Request $request)
	{
		$errors = [];
		if(!isset($request->activity_id)){
			$errors[] = '缺少参数';
		}
		$activity = Activity::where('id',$request->activity_id)->first();
		if(!$activity){
			$errors[] = '参数错误';
		}
		if(count($errors)){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($errors);
		}
		$summary = Summary::where('activity_id',$activity->id)->first();

		return $this->view('activitys.create_summary')->with('activity',$activity)->with('summary',$summary);
	}
	public function storeSummary ()
	{
		$data = Input::get();
    	$rules = [
    		'title' => 'required|string|between:3,80',
    		'activity_id'	=> 'required|exists:activities,id|unique:summaries',
			'body'  => 'required|string',
	    ];
	    $messages = [
	    	'title.required' => '标题必填',
	    	'title.between' => '标题必须在3-80字之间',
			'activity_id.required' => '缺少参数',
			'activity_id.exists' => '参数错误',
			'activity_id.unique' => '该活动已经存在总结，请勿重复提交',
			'body.required' => '内容不能为空'
	    ];
	    $validator = Validator::make($data,$rules,$messages);
		if($validator->errors()->first()){
			return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
		$summary = Summary::where('activity_id',$data['activity_id'])->first();
		if($summary){
			Summary::where('id',$summary->id)->update(['body' => $data['body']]);
		}
		Summary::create([
			'activity_id' =>  $data['activity_id'],
			'title' => $data['title'],
			'body' => $data['body']
		]);
		return Redirect::route('activity.create_summary',['activity_id' => $data['activity_id']])
                ->withSuccess('创建成功');
	}
	public function users(Request $request)
	{
		$activity_id = isset($request->id) ? $request->id : '';
		$activity = Activity::where('id',$activity_id)->first();
		if (!$activity) {
            throw new NotFoundHttpException();
        }
		$type = isset($request->type) ? $request->type : 'join';
		$users = Activity_actors::select('users.avatar_url','users.username','activity_actors.user_id')
											->join('users','users.id','=','activity_actors.user_id')
											->where('activity_id',$activity_id);

		$join_count = Activity_actors::where('activity_actors.actor_type','join')->where('activity_id',$activity_id)->count();
		$follow_count = Activity_actors::where('activity_actors.actor_type','follow')->where('activity_id',$activity_id)->count();
	    switch($type)
	    {
	    	case 'join':
	    		$users = $users->where('activity_actors.actor_type','join');
	    		break;
	    	case 'follow':
	    		$users = $users->where('activity_actors.actor_type','follow');
	    		break;
	    	default:
	    		break;
	    }

		$users = $users->distinct()->get();



		return $this->view('activitys.users')
					->with('users',$users)
					->with('activity',$activity)
					->with('type',$type)
					->with('join_count',$join_count)
					->with('follow_count',$follow_count);
	}
	public function relieve_banned(Request $request)
	{
		$data = Input::get();
	    $rules = [
	    	'pay_id' => "required|in:1,2",
	    ];
	    $message = [
	    	'pay_id.required'	=> '请选择支付方式',
	    	'pay_id.in'	=> '支付方式不存在',
	    ];
		$data['money'] = 5;
	    $validator = Validator::make($data,$rules,$message);
	    if($validator->errors()->first()){
		    return  Redirect::back()
			                ->withInput(Input::all())
			                ->withErrors($validator->errors());
		}
	    $out_trade_no = buildOutTradeNo();
	    ActivityBanned::create([
			'user_id' => Auth::id(),
			'pay_id'  => $data['pay_id'],
			'payment' => trans('hifone.pay_id.'.$data['pay_id']),
			'out_trade_no' => $out_trade_no,
			'money' => $data['money'],
			'pay_status' => 0,
	    ]);
    	// 创建支付单。
	    $alipay = app('alipay.web');
	    $alipay->setOutTradeNo($out_trade_no);
	    $alipay->setTotalFee(0.01);
		$alipay->setNotifyUrl(config('latrell-alipay-web.activity_notify_url'));
	    $alipay->setSubject('单号：'.$out_trade_no);
	    $alipay->setBody('单号：'.$out_trade_no);

	  //  $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

	    // 跳转到支付页面。
	    return redirect()->to($alipay->getPayLink());
	}
	public function aliNotify ()
    {
	    Log::debug("android支付宝支付回调开始1");
    	// 验证请求。
        /*if (! app('alipay.web')->verify()) {
	        Log::debug('alipay:fail');
            return 'fail';
        }*/
		Log::debug("android支付宝支付回调开始2");
        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                $out_trade_no = Input::get('out_trade_no');
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => $out_trade_no,
                    'trade_no' => Input::get('trade_no')
                ]);
				$activity_banned = app(ActivityBanned::class)->where('out_trade_no',$out_trade_no)->first();
                if($activity_banned->pay_status == 0){
	                $result = app(ActivityBanned::class)->where('out_trade_no',$out_trade_no)->update(['pay_status' => 1]);
	                $user = User::findByUid($recharge->user_id,['id','coin']);
	                User::where('id',$activity_banned->user_id)->update(['activity_banned' => 0]);
	                Log::debug('result'.$result);
                }
                break;
        }
		Log::debug('alipay:success');
        return 'success';
    }
	public function export_member(Request $request)
	{
		$activity = Activity::where('id',$request->activity_id)->first();

		$activity_actors = Activity_actors::where('activity_actors.activity_id',$request->activity_id)
											->leftJoin('users','users.id','=','activity_actors.user_id')
											->leftJoin('user_realnames','users.id','=','user_realnames.user_id')
											->get();

        $cellData = [['手机号码','昵称','付款方式']];
		foreach ($activity_actors as $key => $activity_actor) {
			$cellData[] = [$activity_actor['mobile'],$activity_actor['username'],$activity_actor['payment']];
		}

		Excel::create($activity->name.'活动成员',function($excel) use ($cellData){
			$excel->sheet('score', function($sheet) use ($cellData){
				$sheet->rows($cellData);
			});
		})->export('xls');
	}
}
