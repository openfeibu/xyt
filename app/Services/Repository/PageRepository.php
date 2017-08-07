<?php

namespace Hifone\Services\Repository;

use DB;
use Log;
use Auth;
use Input;
use Cache;
use Hifone\Models\Page;
use Hifone\Models\Type;
use Illuminate\Support\Facades\View;

class PageRepository{

	public function pages ($type_id)
	{
		$types = $this->types();
		$types = $types ? $types->toArray() : [];
		$subs = $this->getSubs($types,$type_id);
		$subs[] = $type_id;
		$pages = app(Page::class)->whereIn('type_id',$subs)->paginate(20);
		foreach( $pages as $key => $page )
		{
			$type = $this->type($page->type_id);
			$page->type_name = $type->type;
			$page->url = route('about.show',['id' => $page->id]);
		}
		return $pages;
	}
	public function types ()
	{
		$types = app(Type::class)->where('is_show',1)->get();
		return $types;
	}
	public function type ($type_id,$columns = ['*'])
	{
		return  app(Type::class)->where('id',$type_id)->first($columns);
	}
	//获取某个分类的所有子分类
	public function getSubs($types,$id=0,$level=1){
	    $subs=array();
	    foreach($types as $type){
	        if($type['pid']==$id){
	            $type['level']=$level;
	            $subs[] = $type['id'];
	            $subs=array_merge($subs,$this->getSubs($types,$type['id'],$level+1));

	        }
	    }
	    return $subs;
	}
	public function getAllSubs($types,$id=0,$level=1){
	    $subs=array();
	    foreach($types as $k=> $type){
	        if($type['pid']==$id){
	            $type['level']=$level;
	            $subs[$k] = $type;
	            $subs[$k]['child'] = $this->getAllSubs($types,$type['id'],$level+1);

	        }
	    }
	    return $subs;
	}
	public function getPages($type_id ,$num = '10',$orderBy = 'desc')
	{
		$pages = app(Page::class)->where('type_id',$type_id)->orderBy('id',$orderBy)->take($num)->get();
		foreach( $pages as $key => $page )
		{
			$type = $this->type($page->type_id);
			$page->type_name = $type->type;
			$page->url = route('about.show',['id' => $page->id]);
		}
		return $pages;
	}
	public function announcements ($num = '10')
	{
		return app(Page::class)->where('type_id',5)->take($num)->get();
	}
}
