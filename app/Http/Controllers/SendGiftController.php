<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use Hifone\Models\User;
use Hifone\Models\Gift;
use Hifone\Models\GiftType;
use Hifone\Models\SendGift;
use Hifone\Models\Notification;


class SendGiftController extends Controller
{
	public function gift (Request $request)
	{
		$rules = [
	    	'user_id' => "required|exists:users,id",
			'type_id' => 'sometimes|exists:gift_types,id'
	    ];

	    $validator = Validator::make($request->all(),$rules);

	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}
		$type_id = isset($request->type_id) ? $request->type_id : 0;

		if($type_id){
			$gifts = Gift::where('type_id',$type_id)->orderBy('id','asc')->get();
		}else{
			$gifts = Gift::get();
		}

		$to_user = User::findByUid($request->user_id,['*']);

		$base_data = config('form_config.basic_data');

		$gift_types = GiftType::orderBy('id','asc')->get();

		$html = $this->view("widgets.send_gift")->with('gifts',$gifts)->with('to_user',$to_user)->with('base_data',$base_data)->with('gift_types',$gift_types)->__toString();

		return [
			'code' => 200,
			'html' => $html,
		];
	}
	public function hello (Request $request)
	{
		$rules = [
	    	'user_id' => "required|exists:users,id",
	    ];

	    $validator = Validator::make($request->all(),$rules);

	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}

		$user = User::findByUid($request->user_id,['id','avatar_url','username']);
		$emojis = app('expressionRepository')->getAllEmoji();

		$html = $this->view("widgets.send_hello")->with('user',$user)->with('emojis',$emojis)->__toString();

		return [
			'code' => 200,
			'html' => $html,
		];
	}
    public function sendGift(Request $request)
    {
	    $rules = [
	    	'gift_id' => "required|exists:gift,id",
	    	'to_user_id' => "required|exists:users,id",
	    	'send_number' => 'required|min:0'
	    ];

	    $validator = Validator::make($request->all(),$rules);

	    if($validator->errors()->first()){
			return [
				'code' => 201,
				'message' => $validator->errors()->first(),
            ];
		}

        $gift = Gift::where('id',$request->gift_id)->first();
        $user = User::findByUidOrFail(Auth::id());
		$to_user = User::findByUidOrFail($request->to_user_id);
        if($gift->gift_number == 0){
            return [
				'code' => 201,
				'message' => '礼物库存不足',
            ];
        }
        /*if($request->send_number>3){
            return 402;
        }*/
        if($gift->gift_number < $request->send_number){
            return [
				'code' => 201,
				'message' => '最多只能购买 '.$gift->gift_number. '个礼物',
            ];
        }
        $total = $request->send_number * $gift->score;
        if($user->score < $total){
	        return [
				'code' => 201,
				'message' => '积分不足',
            ];
        }
        app(User::class)->where('id',$user->id)->decrement('score',$total);
    	$sendGift = new SendGift;
    	$sendGift->user_id = $user->id;
    	$sendGift->to_user_id = $request->to_user_id;
    	$sendGift->number = $request->send_number;
    	$sendGift->gift_id = $request->gift_id;
		$sendGift->anonymous = $request->anonymous ? $request->anonymous : 0;
    	if($sendGift->save()){
    		$gift->gift_number = $gift->gift_number - $request->send_number;
    		$gift->save();
			app('notifier')->batchNotify(
				'send_gift',
				Auth::user(),
				[$to_user],
				$sendGift,
				''
			);
            return 200;
    	}else{
            return 400;
    	}
    }

    public function sendHello(Request $request){
        $notification = new Notification;
        $notification->author_id = Auth::user()->id;
        $notification->user_id = $request->helloToUser;
        $notification->object_type = "Hifone\Models\SendGift";
        $notification->object_id = 1;
        $notification->type = "say_hello";
        $notification->body = $request->hello_radio;
        if($notification->save()){
            return 200;
        }else{
            return 400;
        }
    }

}
