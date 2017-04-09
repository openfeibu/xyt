<?php
namespace Hifone\Http\Controllers;

use Auth;
use DB;
use Hifone\Models\Report;
use Illuminate\Http\Request;


class ReportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function node_report(Request $request){
    	$addReport = Report::addReport($request->type,$request->content,$request->type_id);
    	if($addReport){
    		return 200;
    	}else{
    		return 403;
    	}	
    }
	
}
