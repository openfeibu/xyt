<?php
namespace Hifone\Http\Controllers;

use Auth;
use Hifone\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Redirect;
use Hifone\Models\Gift;

class SearchController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
        $this->title = '搜索';

    }
    public function index()
    {
		$basic_data = config('form_config.basic_data');
		$standard_data = config('form_config.standard_data');
		return $this->view('searchs.index')
					->with('standard_data',$standard_data)
					->with('basic_data',$basic_data);
    }
	public function friend()
    {
		$basic_data = config('form_config.basic_data');
		$standard_data = config('form_config.standard_data');
		return $this->view('searchs.friend')
					->with('standard_data',$standard_data)
					->with('basic_data',$basic_data);
    }
	public function city()
    {
		$basic_data = config('form_config.basic_data');
		return $this->view('searchs.city')
					->with('basic_data',$basic_data);
    }
	public function townee()
    {
		$basic_data = config('form_config.basic_data');
		return $this->view('searchs.townee')
					->with('basic_data',$basic_data);
    }
	public function birthday()
    {
		$basic_data = config('form_config.basic_data');
		return $this->view('searchs.birthday')
					->with('basic_data',$basic_data);
    }
	public function classmate()
    {
		$basic_data = config('form_config.basic_data');
		return $this->view('searchs.classmate')
					->with('basic_data',$basic_data);
    }
	public function colleague()
    {
		return $this->view('searchs.colleague');
    }
	public function accurate()
    {
		return $this->view('searchs.accurate');
    }
	public function result(Request $request)
    {
		$basic_data = config('form_config.basic_data');
		$standard_data = config('form_config.standard_data');

		$sql = "select id,nickname,sex,school,work,avatar_url,username,location,follower_count from users where 1 = 1";
		if($request->sex != 0 && !empty($request->sex)){
			$sql.=" and sex = '$request->sex'";
		}
		if($request->blood != 0 && !empty($request->blood)){
			$sql.=" and blood = '$request->blood'";
		}
		if($request->marriage != 0 && !empty($request->marriage)){
			$sql.=" and marriage = '$request->marriage'";
		}
		if($request->education != 0 && !empty($request->education)){
			$sql.=" and education = '$request->education'";
		}
		if(!empty($request->nickname)){
			$sql.=" and username LIKE '%$request->nickname%'";
		}
		if(!empty($request->school)){
			$sql.=" and school LIKE '%$request->school%'";
		}
		if($request->enrol_year != 0 && !empty($request->enrol_year)){
			$sql.=" and enrol_year = '$request->enrol_year'";
		}
		if(!empty($request->faculty)){
			$sql.=" and faculty LIKE '%$request->faculty%'";
		}
		if(!empty($request->company)){
			$sql.=" and company LIKE '%$request->company%'";
		}
		if(!empty($request->branch)){
			$sql.=" and branch LIKE '%$request->branch%'";
		}
		if(!empty($request->year) && !empty($request->month) && !empty($request->day)){
			$sql.=" and birthday = ".$request->year."-".$request->month."-".$request->day;
		}elseif(!empty($request->year) && !empty($request->month) && empty($request->day)){
			$sql.=" and birthday LIKE  '%".$request->year."-".$request->month."%'";
		}
		if(!empty($request->province)){
			$sql.=" and province = '$request->province'";
		}
		if(!empty($request->city)){
			$sql.=" and city = '$request->city'";
		}
		if(!empty($request->home_province)){
			$sql.=" and home_province = '$request->home_province'";
		}
		if(!empty($request->home_city)){
			$sql.=" and home_city = '$request->home_city'";
		}
		if($request->age_min != 0 && $request->age_max!=0 && $request->age_min < $request->age_max){
			$sql.=" and age > '$request->age_min' and age < '$request->age_max'";
		}
		if($request->height_min != 0 && $request->height_max != 0 && $request->height_min < $request->height_max){
			$sql.=" and height > '$request->height_min' and height < '$request->height_max'";
		}
		if($request->income != 0 && !empty($request->income)){
			$sql.=" and income = '$request->income'";
		}
		if($request->house != 0 && !empty($request->house)){
			$sql.=" and house = '$request->house'";
		}
		if(!empty($request->work)){
			$sql.=" and work = '$request->work'";
		}
		if($request->avatar_url == 1 ){
			$sql.=" and avatar_url IS NOT NULL";
		}
		if($request->avatar_url == 2){
			$sql.=" and avatar_url IS NULL";
		}
		if($request->smoke != 0 && !empty($request->smoke)){
			$sql.=" and smoke = '$request->smoke'";
		}
		if($request->drink != 0 && !empty($request->drink)){
			$sql.=" and drink = '$request->drink'";
		}
		if(!empty($request->username)){
			$sql.=" and username LIKE '%$request->username%'";
		}
		if(!empty($request->user_id)){
			$sql.=" and id = '$request->user_id'";
		}

		if(empty($request->hidden)){
			$result_all =  DB::select($request->session()->get('sql'));
			$sql2 = $request->session()->get('sql');
		}else{
			$result_all =  DB::select($sql);
			$sql2 = $sql;
		}
		$begin = 5*($request->page-1);

		if(empty($request->hidden)){
			$sql =  $request->session()->get('sql');
			if(!empty($request->order)){
				if($request->order == "descBylogin"){
					$sql .= "  ORDER BY last_login DESC";
				}elseif($request->order == "descByregister"){
					$sql .= "  ORDER BY created_at ASC";
				}elseif($request->order == "descByrq"){
					$sql .= "  ORDER BY follower_count DESC";
				}
                $order = $request->order;
			}else{
                $sql .= "  ORDER BY last_login DESC";
                $order = "descBylogin";
            }
			$sql .=  "  limit $begin,5";
		}else{
            $order = "descBylogin";
            $sql .= "  ORDER BY last_login DESC";
			$sql =  $sql."  limit $begin,5";
		}
		$users = DB::select($sql);

		$users = app('userRepository')->handleUsers($users);

		$request->session()->put('sql',$sql2);

		$gift = Gift::get();

		return $this->view('searchs.result')
				->with('uid',Auth::user()->id)
				->with('users',$users)
				->with('page_count',ceil(count($result_all)/5))
				->with('page',$request->page)
				->with('gifts',$gift)
                ->with('order',$order)
				->with('standard_data',$standard_data)
				->with('basic_data',$basic_data);
    }

}
