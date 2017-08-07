<?php
/**
 * 表情模型 - 业务逻辑模型
 * @author jason <yangjs17@yeah.net>
 * @version TS3.0
 */
namespace Hifone\Services\Repository;



class ExpressionRepository
{
	public function __construct ()
	{

	}
    /**
     * 获取当前所有的表情
     * @param  bool  $flush 是否更新缓存，默认为false
     * @return array 返回表情数据
     */
    public static function getAllExpression($flush = false)
    {
        $cache_id = '_model_expression';

        if (!($res = S($cache_id)) || $flush === true) {
            $filepath = public_path().'/images/arclist';
            $expression = new \Hifone\Services\Repository\DirRepository($filepath);
            $expression_pkg = $expression->toArray();
            $res = array();
            foreach ($expression_pkg as $value) {
                list($file) = explode('.', $value['filename']);
                $temp['title'] = $file;
                $temp['emotion'] = '['.$file.']';
                $temp['filename'] = $value['filename'];
                $res[$temp['emotion']] = $temp;
            }
            S($cache_id, $res);

       	}

        return $res;
    }
	public static function getAllEmoji($flush = false)
    {
        $cache_id = '_model_emoji';

        if (!($res = S($cache_id)) || $flush === true) {
            $filepath = public_path().'/images/emoji';
            $expression = new \Hifone\Services\Repository\DirRepository($filepath);
            $expression_pkg = $expression->toArray();

            $res = array();
            foreach ($expression_pkg as $value) {
                list($file) = explode('.', $value['filename']);
                $temp['title'] = $file;
                $temp['emotion'] = '['.$file.']';
                $temp['filename'] = $value['filename'];
				$temp['file_url'] = '/images/emoji/'.$temp['filename'];
                $res[$temp['emotion']] = $temp;
            }
			$res = my_sort($res,'title',SORT_ASC,SORT_NUMERIC);

            S($cache_id, $res);

       	}

        return $res;
    }
    /**
     * 将表情格式化成HTML形式
     * @param  string $data 内容数据
     * @return string 转换为表情链接的内容
     */
    public function parse($data)
    {
        $data = preg_replace('/img{data=([^}]*)}/', "<img src='$1'  data='$1' >", $data);

        return $data;
    }
}
