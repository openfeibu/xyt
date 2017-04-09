<?php
namespace Hifone\Http\Controllers;

use Auth;
use Hifone\Models\User;
use Hifone\Models\Credit;
use DB;
use Hifone\Events\Sign\SignWasAddedEvent;

class SignController extends Controller
{
    public function index()
    {
		$checkSignForOneday = true;
		if(!$checkSignForOneday){
			return 403;
		}else{
			event(new SignWasAddedEvent());
			return 200;
		}	
    }
}
