<?php
namespace Hifone\Http\Controllers;

use DB;
use Auth;
use Input;
use Redirect;
use Validator;
use Carbon\Carbon;
use Hifone\Models\Type;
use Hifone\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function __construct()
    {
         parent::__construct();
    }
    public function index(Request $request)
    {	
    	$types = app('pageRepository')->types();
    	$types = $types ? $types->toArray() : [];
    	$type_subs = app('pageRepository')->getAllSubs($types,0);
    	$type_id = isset($request->type_id) ? intval($request->type_id) : '';
    	$abouts = app('pageRepository')->pages($type_id);
		return $this->view('about.about')
					->with('types',$type_subs)
					->with('abouts',$abouts);
    }
    public function show ($id)
    {
	    $types = app('pageRepository')->types();
    	$types = $types ? $types->toArray() : [];
    	$type_subs = app('pageRepository')->getAllSubs($types,0);
    	
    	$page = app(Page::class)->where('id',$id)->first();
    	if (is_null($page)) {
           throw new ModelNotFoundException();
        }
        $type = app('pageRepository')->type($page->type_id);
		$this->breadcrumb->push([
				'返回文章列表' => route('about.index'),
                $type->type => route('about.index',['type_id'=>$page->type_id]),
				$page->title => ''
        ]);
        return $this->view('about.show')->with('types',$type_subs)->with('page',$page);
    }
}
