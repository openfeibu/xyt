<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use Hifone\Models\User;
use Hifone\Models\Card;
use Hifone\Models\Notification;


class CardController extends Controller
{
    public function getCard(Request $request)
    {
        $card = Card::where('key',$request->key)->first();
        $user_id = $request->user_id;
        $html = $this->view("widgets.card")->with('card',$card)->with('user_id',$user_id)->__toString();

		return [
			'code' => 200,
			'html' => $html,
		];
    }
    public function buyCard(Request $request)
    {
        $key = $request->key;
        $user_id = $request->user_id;
        $card = Card::where('key',$key)->first();
        $user = User::findByUidOrFail(Auth::id());
        if(!$card)
        {
            return [
				'code' => 201,
				'message' => '联络卡不存在',
            ];
        }
        if($card->number <= 0){
            return [
				'code' => 201,
				'message' => '礼物库存不足',
            ];
        }
        if($user->coin < $card->coin){
	        return [
				'code' => 201,
				'message' => '象牙币不足',
            ];
        }
        app(User::class)->where('id',$user->id)->decrement('coin',$card->coin);
        $value = app(User::class)->where('id',$user_id)->pluck($key);
        return [
            'code' => 200,
            'value' => $value,
            'message' => '购买成功',
        ];
    }
}
