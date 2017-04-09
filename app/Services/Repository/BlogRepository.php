<?php

namespace Hifone\Services\Repository;

use DB;
use Log;
use Auth;
use Input;
use Cache;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Illuminate\Support\Facades\View;

class BlogRepository{
	
	public function newBlogs($num = '10')
	{
		return app(Blog::class)->recent()->take($num)->get();
	}
	public function exBlogs($num = '10')
	{
		return app(Blog::class)->where('is_excellent',1)->recent()->take($num)->get();
	}
	public function hotBlogs($num = '10')
	{
		return app(Blog::class)->orderBy('view_count','desc')->recent()->take($num)->get();
	}
	public function getBlogs($type,$where = array())
	{
		$blogs = app(Blog::class)->recent();
		foreach( $where as $key => $value )
		{
			$blogs = $blogs->where($key,$value);
		}
		switch($type)
		{
			case 'recommend':
				$blogs = $blogs->where('is_excellent',1);
				break;	
			case 'new':
				$blogs = $blogs;
				break;	
			case 'reply':
				$blogs = $blogs->orderBy('reply_count','desc');
				break;	
			case 'view':
				$blogs = $blogs->orderBy('view_count','desc');
				break;
			case 'me':
				$blogs = $blogs->where('user_id',Auth::id());
				break;
			default:
				break;
		}
		$blogs = $blogs->paginate(20); 
		foreach( $blogs as $key => $blog )
		{
			$blog->user = User::findByUid($blog->user_id,['username','avatar_url']);
		}
		return $blogs;
	}
}