<?php

namespace Hifone\Services\Repository;

use DB;
use Log;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\Account;
use Hifone\Models\Recharge;
use Illuminate\Support\Facades\View;

class PayRepository{
	
	public function outTradeNoExist ($out_trade_no)
	{
		return Account::where('out_trade_no',$out_trade_no)->first(['id']);
	}
	
}
	