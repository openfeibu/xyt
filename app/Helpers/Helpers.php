<?php

if (!function_exists('back_url')) {
    /**
     * Create a new back url.
     *
     * @param string|null $route
     * @param array       $parameters
     * @param int         $status
     * @param array       $headers
     *
     * @return string
     */
    function back_url($route = null, $parameters = [], $status = 302, $headers = [])
    {
        $url = app('url');

        if ($route !== null && $url->previous() === $url->full()) {
            return $url->route($route, $parameters, $status, $headers);
        }

        return $url->previous();
    }
}

if (!function_exists('set_active')) {
    /**
     * Set active class if request is in path.
     *
     * @param string $path
     * @param array  $classes
     * @param string $active
     *
     * @return string
     */
    function set_active($path, array $classes = [], $active = 'active')
    {
        if (Request::is($path)) {
            $classes[] = $active;
        }
        $class = e(implode(' ', $classes));

        return empty($classes) ? '' : "class=\"{$class}\"";
    }
}

if (!function_exists('thread_filter')) {
    /**
     * Create a node url by filter.
     *
     * @param string|null $filter
     *
     * @return string
     */
    function thread_filter($filter)
    {
        $node_id = Request::segment(2);
        $node_append = '';
        if ($node_id) {
            $link = URL::to(is_numeric($node_id) ? 'nodes' : 'go', $node_id).'?filter='.$filter;
        } else {
            $query_append = '';
            $query = Input::except('filter', '_pjax');
            if ($query) {
                $query_append = '&'.http_build_query($query);
            }
            $link = URL::to('thread').'?filter='.$filter.$query_append.$node_append;
        }
        $selected = Input::get('filter') ? (Input::get('filter') == $filter ? ' class="selected"' : '') : '';

        return 'href="'.$link.'"'.$selected;
    }
}

if (!function_exists('cdn')) {
    /**
     * Create a new cdn url.
     *
     * @param string|null $filepath
     *
     * @return string
     */
    function cdn($filepath = '')
    {
        if (Config::get('setting.site_cdn')) {
            return Config::get('setting.site_cdn').$filepath;
        } else {
            return Config::get('app.url').$filepath;
        }
    }
}

if (!function_exists('upload_url')) {
    /**
     * Create a new upload url.
     *
     * @param string|null $filepath
     *
     * @return string
     */
    function upload_url()
    {
        return Config::get('setting.site_domain') ?: Config::get('app.url');
    }
}

if (!function_exists('option_is_selected')) {
    /**
     * Check if option is selected and output selected else output an empty string.
     *
     * @param array $array
     *
     * @return string
     */
    function option_is_selected(array $array)
    {
        $resource = $array[0];
        $haystack = $array[1];
        $currentResource = isset($array[2]) ? $array[2] : '';

        return (old($haystack) == $resource->id) || ($currentResource && $currentResource->$haystack == $resource->id)
            ? 'selected' : '';
    }
}

if (!function_exists('checkbox_is_active')) {
    /**
     * Check if checkbox is selected and output checked else output an empty string.
     *
     * @param string $haystack
     * @param $resource
     *
     * @return string
     */
    function checkbox_is_active($haystack, array $resource)
    {
        return (old($haystack) == '1') || ($resource && $resource->$haystack == 1) ? 'checked' : '';
    }
}

if (!function_exists('admin_link')) {
    function admin_link($title, $path, $id = '')
    {
        return '<a href="'.admin_url($path, $id).'" target="_blank">'.$title.'</a>';
    }
}

if (!function_exists('admin_url')) {
    function admin_url($path, $id = '')
    {
        return env('APP_URL')."/admin/$path".($id ? '/'.$id : '');
    }
}
if (!function_exists('saveImageToLocal')) {
	//保存远程图片
	function saveImageToLocal($url)
	{
	    if (strncasecmp($url, 'http', 4) != 0) {
	        return false;
	    }
	    $opts = array(
	    'http' => array(
	      'method' => 'GET',
	      'timeout' => 30, //超时30秒
	      'user_agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)',
	      ),
	      );
	    $context = stream_context_create($opts);
	    $file_content = file_get_contents($url, false, $context);

		$upload_path = config('common.upload_video_path');
	    $file_path = date('Ym', time()).'/'.date('d', time()).'/';

        @mkdir($upload_path.$file_path, 0777, true);
	    $i = pathinfo($url);
	    if (!isset($i['extension'])||!in_array($i['extension'], array('jpg', 'jpeg', 'gif', 'png'))) {
	        $i['extension'] = 'jpg';
	    }
	    $file_name = uniqid().'.'.$i['extension'];

	    $res = file_put_contents($upload_path.$file_path.$file_name, $file_content);


	    if ($res) {
	        return $file_path.$file_name;
	    } else {
	        return false;
	    }
	}
}
//获取图片地址
if (!function_exists('getImageUrl2')) {
	function getImageUrl2($type = 'upload_video_path',$file, $width = '0', $height = 'auto', $cut = false, $replace = false)
	{

	    $imageUrl = config('app.url').ltrim(config('common.'.$type),'.').ltrim($file, '/');

	    return $imageUrl;
	}
}
//获取图片地址
if (!function_exists('getImageUrl')) {
	function getImageUrl($file, $width = '0', $height = 'auto', $cut = false, $replace = false)
	{
        $imageUrl = config('app.url').ltrim(config('common.upload_image_path'),'.').ltrim($file, '/');

	    return $imageUrl;
	}
}
/**
 * t函数用于过滤标签，输出没有html的干净的文本
 * @param string text 文本内容
 * @return string 处理后内容
 */
 if (!function_exists('t')) {
	function t($text)
	{
	    $text = nl2br($text);
	    $text = real_strip_tags($text);
	    $text = addslashes($text);
	    $text = trim($text);

	    return $text;
	}
}
/**
 * h函数用于过滤不安全的html标签，输出安全的html
 * @param  string $text 待过滤的字符串
 * @param  string $type 保留的标签格式
 * @return string 处理后内容
 */
if (!function_exists('h')) {
	function h($text, $type = 'html')
	{
	    // 无标签格式
	    $text_tags = '';
	    //只保留链接
	    $link_tags = '<a>';
	    //只保留图片
	    $image_tags = '<img>';
	    //只存在字体样式
	    $font_tags = '<i><b><u><s><em><strong><font><big><small><sup><sub><bdo><h1><h2><h3><h4><h5><h6>';
	    //标题摘要基本格式
	    $base_tags = $font_tags.'<p><br><hr><a><img><map><area><pre><code><q><blockquote><acronym><cite><ins><del><center><strike>';
	    //兼容Form格式
	    $form_tags = $base_tags.'<form><input><textarea><button><select><optgroup><option><label><fieldset><legend>';
	    //内容等允许HTML的格式
	    $html_tags = $base_tags.'<meta><ul><ol><li><dl><dd><dt><table><caption><td><th><tr><thead><tbody><tfoot><col><colgroup><div><span><object><embed><param>';
	    //专题等全HTML格式
	    $all_tags = $form_tags.$html_tags.'<!DOCTYPE><html><head><title><body><base><basefont><script><noscript><applet><object><param><style><frame><frameset><noframes><iframe>';
	    //过滤标签
	    $text = real_strip_tags($text, ${$type.'_tags'});
	    // 过滤攻击代码
	    if ($type != 'all') {
	        // 过滤危险的属性，如：过滤on事件lang js
	        while (preg_match('/(<[^><]+)(allowscriptaccess|ondblclick|onclick|onload|onerror|unload|onmouseover|onmouseup|onmouseout|onmousedown|onkeydown|onkeypress|onkeyup|onblur|onchange|onfocus|action|background|codebase|dynsrc|lowsrc)([^><]*)/i', $text, $mat)) {
	            $text = str_ireplace($mat[0], $mat[1].$mat[3], $text);
	        }
	        while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
	            $text = str_ireplace($mat[0], $mat[1].$mat[3], $text);
	        }
	    }

	    return $text;
	}
}
if (!function_exists('S')) {
	function S($name, $value = '', $expire = 1)
	{
	    static $_cache = array();   //减少缓存读取

	    //$name = C('DATA_CACHE_PREFIX').$name;

	    if ('' !== $value) {
	        if (is_null($value)) {
	            // 删除缓存
	            $result = Cache::pull($name);
	            if ($result) {
	                unset($_cache[$name]);
	            }

	            return $result;
	        } else {
	            // 缓存数据
	            Cache::put($name, $value, $expire);
	            $_cache[$name] = $value;
	        }

	        return true;
	    }
	    if (isset($_cache[$name])&&!empty($_cache[$name])) {
	        return $_cache[$name];
	    }
	    // 获取缓存数据
	    $value = Cache::get($name);
	    $_cache[$name] = $value;

	    return $value;
	}
}
if (!function_exists('real_strip_tags')) {
	function real_strip_tags($str, $allowable_tags = '')
	{
	    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

	    return strip_tags($str, $allowable_tags);
	}
}
if (!function_exists('filter_words')) {
	function filter_words($content)
	{
	    $data = Hifone\Models\SensitiveWord::checkedContent($content);

	    return $data;
	}
}
/**
 * 检查表单是否已锁定
 *
 * @return bool 表单已锁定时返回true, 否则返回false
 */
if (!function_exists('isSubmitLocked')) {
	function isSubmitLocked()
	{
		return isset($_SESSION['LOCK_SUBMIT_TIME']) && intval($_SESSION['LOCK_SUBMIT_TIME']) > time() ;
	}
}

/**
 * 锁定表单
 *
 * @param  int  $life_time 表单锁的有效时间(秒). 如果有效时间内未解锁, 表单锁自动失效.
 * @return bool 成功锁定时返回true, 表单锁已存在时返回false
 */
if (!function_exists('lockSubmit')) {
	function lockSubmit($life_time = null)
	{
	    if (isset($_SESSION['LOCK_SUBMIT_TIME']) && intval($_SESSION['LOCK_SUBMIT_TIME']) > time()) {
	        return false;
	    } else {
	        $life_time = $life_time ? $life_time : 10;
			$_SESSION['LOCK_SUBMIT_TIME'] = time() + intval($life_time);
	        return true;
	    }
	}
}

/**
 * 表单解锁
 *
 */
if (!function_exists('unlockSubmit')) {
	function unlockSubmit()
	{
	    unset($_SESSION['LOCK_SUBMIT_TIME']);
	}
}

/**
 * 获取客户端IP地址
 */
 if (!function_exists('get_client_ip')) {
	function get_client_ip($type = 0)
	{
	    $type = $type ? 1 : 0;
	    static $ip = null;
	    if ($ip !== null) {
	        return $ip[$type];
	    }
	    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	        $pos = array_search('unknown', $arr);
	        if (false !== $pos) {
	            unset($arr[$pos]);
	        }
	        $ip = trim($arr[0]);
	    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    // IP地址合法验证
	    $long = sprintf('%u', ip2long($ip));
	    $ip = $long ? array($ip, $long) : array('127.0.0.1', 0);

	    return $ip[$type];
	}
}
if (!function_exists('get_client_port')) {
	function get_client_port()
	{
	    $port = $_SERVER['REMOTE_PORT'];
	    return $port;
	}
}
/**
 *
 * 正则替换和过滤内容
 *
 * @param  $html
 * @author jason
 */
 if (!function_exists('preg_html')) {
	function preg_html($html)
	{
	    $p = array("/<[a|A][^>]+(topic=\"true\")+[^>]*+>#([^<]+)#<\/[a|A]>/",
	            "/<[a|A][^>]+(data=\")+([^\"]+)\"[^>]*+>[^<]*+<\/[a|A]>/",
	            '/<[img|IMG][^>]+(src=")+([^"]+)"[^>]*+>/', );
	    $t = array('topic{data=$2}', '$2', 'img{data=$2}');
	    $html = preg_replace($p, $t, $html);
	    $html = strip_tags($html, '<br/>');

	    return $html;
	}
}
//解析数据成网页端显示格式
if (!function_exists('parse_html')) {
	function parse_html($html)
	{
	    $html = htmlspecialchars_decode($html);

	    //以下三个过滤是旧版兼容方法-可屏蔽
	    $html = preg_replace('/img{data=([^}]*)}/', ' ', $html);
	    $html = preg_replace('/topic{data=([^}]*)}/', '<a href="$1" topic="true">#$1#</a>', $html);
	   /* $html = preg_replace_callback('/@{uid=([^}]*)}/', '_parse_at_by_uid', $html);*/
	    //链接替换
	    $html = str_replace('[SITE_URL]', config('app.url'), $html);
	    //表情处理
	    $html = preg_replace_callback("/(\[.+?\])/is", '_parse_expression', $html);
	    /*//话题处理
	    $html = str_replace('＃', '#', $html);
	    $html = preg_replace_callback("/#([^#]*[^#^\s][^#]*)#/is", '_parse_theme', $html);*/
	    //@提到某人处理
	    $html = preg_replace_callback("/@([\w\x{2e80}-\x{9fff}\-]+)/u", '_parse_at_by_uname', $html);
	    /* emoji解析 */
	    //$html = formatEmoji(false, $html);

	    return $html;
	}
}
/**
 * 根据用户昵称获取用户ID [格式化分享与格式化评论专用]
 * @param  array  $name
 * @return string
 */

function _parse_at_by_uname($name)
{
    $info = S('user_info_uname_'.$name[1]);
    if (!$info) {
        $info = \Hifone\Models\User::findByUsernameOrFail($name[1]);
        if (!$info) {
            $info = 1;
        }
        S('user_info_uname_'.$name[1], $info);
    }

    if ($info && !$info->is_banned) {
        return '<a href="'.route('user.home',['uid' =>$info->id ]).'" uid="'.$info['uid'].'" event-node="face_card" target="_blank">'.$name[0].'</a>';
    } else {
        return $name[0];
    }
}

/**
 * 格式化Emoji
 **/
if (!function_exists('formatEmoji')) {
	function formatEmoji($type = false, $data)
	{
	    return $data;
	}
}
/**
 * 表情替换 [格式化说说与格式化评论专用]
 * @param array $data
 */
if (!function_exists('_parse_expression')) {
	function _parse_expression($data)
	{
	    if (preg_match('/#.+#/i', $data[0])) {
	        return $data[0];
	    }
	    $allexpression = \Hifone\Services\Repository\ExpressionRepository::getAllExpression();
	    $info = $allexpression[$data[0]];
	    global $ts;

	    if ($info) {
	        return preg_replace("/\[.+?\]/i", "<img class=\"emot\" style=\"width:20px;\" src='/images/arclist/".$info['filename']."' />", $data[0]);
	    } else {
	        return $data[0];
	    }
	}
}

/**
 * 格式化分享内容中url内容的长度
 * @param  string $match 匹配后的字符串
 * @return string 格式化后的字符串
 */
if (!function_exists('_format_feed_content_url_length')) {
	function _format_feed_content_url_length($match)
	{
	    static $i = 97;
	    $result = '{tsurl=='.chr($i).'}';
	    $i++;
	    $data['replaceHash'][$result] = $match[0];
	    Cache::put('replaceHash',$data['replaceHash'],1);
	    return $result;
	}
}
/**
 * 获取字符串的长度
 *
 * 计算时, 汉字或全角字符占1个长度, 英文字符占0.5个长度
 *
 * @param  string $str
 * @param  bool   $filter 是否过滤html标签
 * @return int    字符串的长度
 */
if (!function_exists('get_str_length')) {

	function get_str_length($str, $filter = false)
	{
	    if ($filter) {
	        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
	        $str = strip_tags($str);
	    }

	    return (strlen($str) + mb_strlen($str, 'UTF8')) / 4;
	}
}
if (!function_exists('replaceUrl')) {
	function replaceUrl($content)
	{
	    //$content = preg_replace_callback('/((?:https?|ftp):\/\/(?:[a-zA-Z0-9][a-zA-Z0-9\-]*)*(?:\/[^\x{2e80}-\x{9fff}\s<\'\"“”‘’,，。]*)?)/u', '_parse_url', $content);
	    $content = str_replace('[SITE_URL]', config('app.url'), $content);
	    $content = preg_replace_callback('/((?:https?|mailto|ftp):\/\/([^\x{2e80}-\x{9fff}\s<\'\"“”‘’，。}]*)?)/u', '_parse_url', $content);

	    return $content;
	}
}
/**
 * 格式化分享,替换链接地址
 * @param string $url
 */
 if (!function_exists('_parse_url')) {
	function _parse_url($url)
	{
	    $str = '';//'<div class="url">';
	    if (preg_match('/(youku.com|youtube.com|ku6.com|sohu.com|mofile.com|sina.com.cn|tudou.com|yinyuetai.com)/i', $url[0], $hosts)) {
	        // event-node="show_url_detail" class="ico-url-video"
	        $str .= '<a href="'.$url[0].'" target="_blank">访问视频+</a>';
	    } elseif (strpos($url[0], 'taobao.com')) {
	        // event-node="show_url_detail" class="ico-url-taobao"
	        $str .= '<a href="'.$url[0].'" target="_blank">访问淘宝+</a>';
	    } else {
	        // event-node="show_url_detail" class="ico-url-web"
	        $str .= '<a href="'.$url[0].'" target="_blank">访问链接+</a>';
	    }
	    $str .= '';//'<div class="url-detail" style="display:none;">'.$url[0].'</div></div>';
	    return $str;
	}
}


if(!function_exists('orderHandle')){
	function orderHandle($sql,$order){

		foreach( $order as $key => $value )
  		{
	  		foreach( $value as $k => $v )
	  		{
	  			$sql = $sql->orderBy($k,$v);
	  		}
  		}
		return $sql;
	}

}

/**
 * 取一个二维数组中的每个数组的固定的键知道的值来形成一个新的一维数组
 * @param $pArray 一个二维数组
 * @param $pKey 数组的键的名称
 * @return 返回新的一维数组
 */
if(!function_exists('getSubByKey')){
	function getSubByKey($pArray, $pKey = '', $pCondition = '')
	{
	    $result = array();
	    if (is_array($pArray)) {
	        foreach ($pArray as $temp_array) {
	            if (is_object($temp_array)) {
	                $temp_array = (array) $temp_array;
	            }
	            if (('' != $pCondition && $temp_array[$pCondition[0]] == $pCondition[1]) || '' == $pCondition) {
	                $result[] = ('' == $pKey) ? $temp_array : isset($temp_array[$pKey]) ? $temp_array[$pKey] : '';
	            }
	        }

	        return $result;
	    } else {
	        return false;
	    }
	}
}
if(!function_exists('getList')){
	function getList ($prefix, $key)
	{
		foreach ($key as $k) {
            $_k = $prefix.$k;

            $data[$k] = Cache::get($_k);
        }
        return $data;
	}
}
if(!function_exists('getFromClient')){
	function getFromClient ($type = 0)
	{
		$type = intval($type);
	    $client_type = array(
		    0 => '来自网站',
		    1 => '来自手机',
		    2 => '来自Android',
		    3 => '来自iPhone',
		    4 => '来自iPad',
		    5 => '来自Windows',
	    );

	    //在列表中的
	    if (in_array($type, array_keys($client_type))) {
	        return $client_type[$type];
	    } else {
	        return $client_type[0];
	    }
	}
}
/**
 * 友好的时间显示
 *
 * @param  int    $sTime 待显示的时间
 * @param  string $type  类型. normal | mohu | full | ymd | other
 * @param  string $alt   已失效
 * @return string
 */
if(!function_exists('friendlyDate')){
	function friendlyDate($sTime, $type = 'normal', $alt = 'false')
	{
	    if (!$sTime) {
	        return '';
	    }
	    $sTime = strtotime($sTime);
	    //sTime=源时间，cTime=当前时间，dTime=时间差
	    $cTime = time();
	    $dTime = $cTime - $sTime;
	    $dDay = intval(date('z', $cTime)) - intval(date('z', $sTime));
	    //$dDay     =   intval($dTime/3600/24);
	    $dYear = intval(date('Y', $cTime)) - intval(date('Y', $sTime));
	    //normal：n秒前，n分钟前，n小时前，日期
	    if ($type == 'normal') {
	        if ($dTime < 60) {
	            if ($dTime < 10) {
	                return '刚刚';    //by yangjs
	            } else {
	                return intval(floor($dTime / 10) * 10).'秒前';
	            }
	        } elseif ($dTime < 3600) {
	            return intval($dTime / 60).'分钟前';
	            //今天的数据.年份相同.日期相同.
	        } elseif ($dYear == 0 && $dDay == 0) {
	            //return intval($dTime/3600)."小时前";
	            return '今天'.date('H:i', $sTime);
	        } elseif ($dYear == 0) {
	            return date('m月d日 H:i', $sTime);
	        } else {
	            return date('Y-m-d H:i', $sTime);
	        }
	    } elseif ($type == 'mohu') {
	        if ($dTime < 60) {
	            return $dTime.'秒前';
	        } elseif ($dTime < 3600) {
	            return intval($dTime / 60).'分钟前';
	        } elseif ($dTime >= 3600 && $dDay == 0) {
	            return intval($dTime / 3600).'小时前';
	        } elseif ($dDay > 0 && $dDay <= 7) {
	            return intval($dDay).'天前';
	        } elseif ($dDay > 7 &&  $dDay <= 30) {
	            return intval($dDay / 7).'周前';
	        } elseif ($dDay > 30) {
	            return intval($dDay / 30).'个月前';
	        }
	        //full: Y-m-d , H:i:s
	    } elseif ($type == 'full') {
	        return date('Y-m-d , H:i:s', $sTime);
	    } elseif ($type == 'ymd') {
	        return date('Y-m-d', $sTime);
	    } else {
	        if ($dTime < 60) {
	            return $dTime.'秒前';
	        } elseif ($dTime < 3600) {
	            return intval($dTime / 60).'分钟前';
	        } elseif ($dTime >= 3600 && $dDay == 0) {
	            return intval($dTime / 3600).'小时前';
	        } elseif ($dYear == 0) {
	            return date('Y-m-d H:i:s', $sTime);
	        } else {
	            return date('Y-m-d H:i:s', $sTime);
	        }
	    }
	}
}
/*根据表名获取模型*/
if(!function_exists('tableModel')){
	function tableModel ($table_name)
	{
		$model = '\Hifone\Models\\'.rtrim(ucfirst($table_name),'s');
		return $model;
	}
}
/**
 * L函数用于读取/设置语言配置
 * @param string name 配置名称
 * @param string value 值
 * @return mixed 配置值|设置状态
 */
if(!function_exists('L')){
	function L($key, $data = array())
	{
	    if (empty($data)) {
	        return trans('public.'.$key);
	    }
	    $replace = array_keys($data);
	    foreach ($replace as &$v) {
	        $v = '{'.$v.'}';
	    }

	    return str_replace($replace, $data, trans('public.'.$key));
	}
}
//获取当前访问者的客户端类型
if(!function_exists('getVisitorClient')){
	function getVisitorClient()
	{
	    //客户端类型，0：网站；1：手机版；2：Android；3：iPhone；4：iPad；5：win.Phone
	    /*if(preg_match("/android/i", $_SERVER['HTTP_USER_AGENT'])){
	        return 2;
	    }elseif(preg_match("/iphone/i", $_SERVER['HTTP_USER_AGENT'])){
	        return 3;
	    }elseif(preg_match("/ipad/i", $_SERVER['HTTP_USER_AGENT'])){
	        return 3;
	    }
	    elseif(stristr($_SERVER['HTTP_VIA'],"wap") || strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){// 先检查是否为wap代理，准确度高
	        return 1;
	    }elseif(preg_match('/(windows ce)/i', $_SERVER['HTTP_USER_AGENT'])){
	        return 5;
	    }*/
	    return '0';
	}
}
/**
 +----------------------------------------------------------
 * 字符串截取，支持中文和其它编码
 +----------------------------------------------------------
 * @static
 * @access public
 +----------------------------------------------------------
 * @param string $str     需要转换的字符串
 * @param string $start   开始位置
 * @param string $length  截取长度
 * @param string $charset 编码格式
 * @param string $suffix  截断显示字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
if(!function_exists('msubstr')){
	function msubstr($str, $start = 0, $length, $charset = 'utf-8', $suffix = true)
	{
	    if (function_exists('mb_substr')) {
	        $slice = mb_substr($str, $start, $length, $charset);
	    } elseif (function_exists('iconv_substr')) {
	        $slice = iconv_substr($str, $start, $length, $charset);
	    } else {
	        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	        preg_match_all($re[$charset], $str, $match);
	        $slice = implode('', array_slice($match[0], $start, $length));
	    }
	    if ($suffix && $str != $slice) {
	        return $slice.'...';
	    }

	    return $slice;
	}
}
 /**
 * 获取指定日期对应星座
 *
 * @param integer $month 月份 1-12
 * @param integer $day 日期 1-31
 * @return boolean|string
 */
if(!function_exists('getConstellation')){
	function getConstellation($birth)
	{
		$str = substr($birth,0,4);//截取年
	    $month = substr($birth,5,2);//截取月
	    $day = substr($birth,8,2);//截取日
	    if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;
	    $signs = array(
	            array('20'=>'宝瓶座'),
	            array('19'=>'双鱼座'),
	            array('21'=>'白羊座'),
	            array('20'=>'金牛座'),
	            array('21'=>'双子座'),
	            array('22'=>'巨蟹座'),
	            array('23'=>'狮子座'),
	            array('23'=>'处女座'),
	            array('23'=>'天秤座'),
	            array('24'=>'天蝎座'),
	            array('22'=>'射手座'),
	            array('22'=>'摩羯座')
	    );
	    list($start, $name) = each($signs[$month-1]);
	    if ($day < $start)
	        list($start, $name) = each($signs[($month-2 < 0) ? 11 : $month-2]);
	    return $name;
	}
}
if(!function_exists('getAge')){
	function getAge($birthday){
		$age = strtotime($birthday);
		if($age === false){
			return false;
		}
		list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
		$now = strtotime("now");
		list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
		$age = $y2 - $y1;
		if((int)($m2.$d2) < (int)($m1.$d1))
		$age -= 1;
		return $age;
	}
}
if(!function_exists('handleCycle')){
	function handleCycle($frequency){
		if($frequency == -1){
			return "一次性";
		}else if($frequency == 0){
			return "不限周期";
		}else{
			return "每天";
		}
	}
}
if(!function_exists('handleFrequency')){
	function handleFrequency($frequency){
		if($frequency == -1){
			return "1";
		}else if($frequency == 0){
			return "不限次数";
		}else{
			return $frequency;
		}
	}
}
if(!function_exists('handerStar')){
	function handerStar($value){
		return $value > 0 ? "<img src='".asset('/build/dist/images/star.gif')."' alt='' />" : "<img src='".asset('/build/dist/images/star0.gif')."' alt='' />" ;
	}
}
if(!function_exists('handlePrivacy')){
    function handlePrivacy($value){
        return substr_replace($value, '****', 2, 5);
    }
}
if(!function_exists('getCode')){
	function getCode ()
	{
		return rand(1000,9999);
	}
}
if(!function_exists('buildOutTradeNo')){
	function buildOutTradeNo($prefix = ''){
        $out_trade_no = $prefix.date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        if(app('payRepository')->outTradeNoExist($out_trade_no)){
	        $out_trade_no = buildOutTradeNo($prefix);
        }
        return $out_trade_no;
    }
}
if(!function_exists('overdue')){
	function overdue ($months,$date = '')
	{
		if($date){
			return date("Y-m-d", strtotime("+$months months", strtotime($date)));
		}
		return date("Y-m-d", strtotime("+$months months", strtotime(date("Y-m-d"))));
	}
}
if(!function_exists('auto_charset')){
	// 自动转换字符集 支持数组转换
	function auto_charset($fContents, $from, $to)
	{
	    $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
	    $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
	    if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
	        //如果编码相同或者非字符串标量则不转换
	        return $fContents;
	    }
	    if (is_string($fContents)) {
	        if (function_exists('iconv')) {
	            return iconv($from, $to, $fContents);
	        } else {
	            return $fContents;
	        }
	    } elseif (is_array($fContents)) {
	        foreach ($fContents as $key => $val) {
	            $_key = auto_charset($key, $from, $to);
	            $fContents[$_key] = auto_charset($val, $from, $to);
	            if ($key != $_key) {
	                unset($fContents[$key]);
	            }
	        }

	        return $fContents;
	    } else {
	        return $fContents;
	    }
	}
}
if(!function_exists('byte_format')){
	/**
	 * 字节格式化 把字节数格式为 B K M G T 描述的大小
	 * @return string
	 */
	function byte_format($size, $dec = 2)
	{
	    $a = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
	    $pos = 0;
	    while ($size >= 1024) {
	        $size /= 1024;
	        $pos++;
	    }

	    return round($size, $dec).' '.$a[$pos];
	}
}
if(!function_exists('form_config_value')){

	function form_config_value($name, $key,$value)
	{
		if($value){
			return config('form_config')[$name][$key]['value'][$value];
		}
		return '未知';
	}
}
if(!function_exists('handle_text')){
	function handle_text ($text,$length)
	{
		return mb_substr($text,0,$length,'utf-8');
	}
}
if(!function_exists('handle_activity_time')){
    function handle_activity_time($activity,$activity_join_status)
    {
        $deadline = $activity->deadline;
        $exittime = $activity->exittime;
        $html = '<span id="activity_btn_desc">';
        $time = date("Y-m-d H:i:s");

        if($activity_join_status == 1)
        {
            $date=floor((strtotime($exittime)-strtotime($time))/86400);
            $hour=floor((strtotime($exittime)-strtotime($time))%86400/3600);
            $minute=floor((strtotime($exittime)-strtotime($time))%86400/60);
            if($date <= 0){
                if($hour <= 0){
                    if($minute<=0){
                        $html = "退出截止";
                    }else{
                        $html .= "退出截止还剩&nbsp;".$minute."&nbsp;分钟"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_unjoin_btn'>取消报名</a>";
                    }
                }else{
                    $html .= "退出截止还剩&nbsp;".$hour."&nbsp;小时"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_unjoin_btn'>取消报名</a>";
                }
            }else{
                $html .= "退出截止还剩&nbsp;".$date."&nbsp;天"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_unjoin_btn'>取消报名</a>";
            }
        }else{
            $date=floor((strtotime($deadline)-strtotime($time))/86400);
            $hour=floor((strtotime($deadline)-strtotime($time))%86400/3600);
            $minute=floor((strtotime($deadline)-strtotime($time))%86400/60);
            if($date <= 0){
                if($hour <= 0){
                    if($minute<=0){
                        $html = "报名截止";
                    }else{
                        $html .= "报名截止还剩&nbsp;".$minute."&nbsp;分钟"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_join_btn'>立即报名</a>";
                    }
                }else{
                    $html .= "报名截止还剩&nbsp;".$hour."&nbsp;小时"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_join_btn'>立即报名</a>";
                }
            }else{
                $html .= "报名截止还剩&nbsp;".$date."&nbsp;天"."&nbsp;&nbsp;&nbsp;</span><a href='javascript:;' class='details_top_info_right_time_span activity_join_btn'>立即报名</a>";
            }
        }
        return $html;
    }
}
/*排序*/
if(!function_exists('my_sort'))
{
    function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
       if(is_array($arrays)){
           foreach ($arrays as $array){
               if(is_array($array)){
                   $key_arrays[] = $array[$sort_key];
               }else{
                   return false;
               }
           }
       }else{
           return false;
       }
       array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
       return $arrays;
   }
}
if(!function_exists('handle_credit_score'))
{
    function handle_credit_score($name)
    {
        $credit_rule = Hifone\Models\Credit\Rule::where('name',$name)->first();
        $type = $credit_rule->reward > 0 ? '将增加' : '需花费';
        return $type.abs($credit_rule->reward).'积分';
    }
}
