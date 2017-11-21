<?php

namespace Hifone\Services\Repository;

use Cache;
use DB;
use Log;
use Input;
use Illuminate\Support\Facades\View;


class CategoryTreeRepository{

	private $app;                // 分类对应的应用名称
    private $talbe;            // 分类对应的数据表名称
    private $model;            // 分类对应的模型操作对象
    private $message;            // 提示信息

	/**
     * 设置分类模型
     * @param string $table 分类数据
     */
    public function setTable($table,$model)
    {
	    $this->table = $table;
        $this->model = $model;
        return $this;
    }
	/**
     * 获取指定父分类的树形结构
     * @return int   $pid 父分类ID
     * @return array 指定父分类的树形结构
     */
    public function getNetworkList($pid = 0)
    {
        if ($pid != 0) {
            $list = $this->_MakeTree($pid);
        } elseif (!isset($list) and !($list = S('category_cache_'.$this->table))) {
            set_time_limit(0);
            $list = $this->_MakeTree($pid);
            S('category_cache_'.$this->table, $list);
        }

        return $list;
    }
    /**
     * 递归形成树形结构
     * @param  int   $pid   父分类ID
     * @param  int   $level 等级
     * @return array 树形结构
     */
    private function _MakeTree($pid, $level = 0)
    {
        $result = $this->model->where('pid',$pid)->orderBy('sort','asc')->orderBy('id','asc')->get();
        $list = array();
        if ($result) {
            foreach ($result as $key => $value) {
                $id = $value->id;
                $list[$id]['id'] = $value->id;
                $list[$id]['pid'] = $value->pid;
                $list[$id]['title'] = $value->title;
                $list[$id]['level'] = $level;
                $list[$id]['child'] = $this->_MakeTree($value->id, $level + 1);
            }

        }
        return $list;
    }
    public function getTitle ($id)
    {
    	$result = $this->model->where('id',$id)->first(['title']);
    	return $result->title;
    }
    public function getTreeCategoryDetail ($id,$cut = '-',$title = '')
    {
    	$result =  $this->model->where('id',$id)->orderBy('sort','asc')->orderBy('id','asc')->first();
    	$title = $title == '' ? $result->title : $result->title.$cut.$title;
    	if($result->pid != 0){
	    	return $this->getTreeCategoryDetail($result->pid,$cut,$title);
    	}
    	return $title;
    }
	public function getTreeCategoryIds($id,$ids = [])
	{
		$results =  $this->model->where('pid',$id)->orderBy('sort','asc')->orderBy('id','asc')->get();

		foreach ($results as $key => $result) {
		    $child_ids = $this->getTreeCategoryIds($result->id,$ids);
			$ids = array_merge($ids,$child_ids);
		}

		return $ids;
	}
	//获取某个分类的所有子分类
	public function getSubs($catId=0,$categorys = [],$level=1){
		if(!$categorys){
			$categorys = $this->model->where('pid',$catId)->orderBy('sort','asc')->orderBy('id','asc')->get() ;
			$categorys = $categorys ? $categorys->toArray() : [];
		}
	    $subs=array();
	    foreach($categorys as $item){
	        if($item['pid']==$catId){
	            $item['level']=$level;
	            $subs[]=$item;
	            $subs=array_merge($subs,$this->getSubs($item['id'],$categorys,$level+1));
	        }
	    }
	    return $subs;
	}
    public function getTopCats()
    {
    	$result =  $this->model->where('pid',0)->orderBy('sort','asc')->orderBy('id','asc')->get();
    	return $result;
    }
}
