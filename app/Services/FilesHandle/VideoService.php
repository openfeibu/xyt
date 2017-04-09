<?php
	
namespace Hifone\Services\FilesHandle;


class VideoService{
	/**
     * 更具优酷播放页面地址，获取优酷单条视频信息地址
     *
     * @return return array
     * @author Medz Seven <lovevipdsw@vip.qq.com>
     **/
    public function getYoukuOutsideVideoInfo($link)
    {
        $showBasicUrl = 'https://openapi.youku.com/v2/videos/show_basic.json';
        $config = config('common.video');

        /* # link */
        /* http://player.youku.com/player.php/sid/XMTMzMDA2NTExMg==/v.swf */
        $sid = preg_replace('/https?\:\/\/player\.youku\.com\/player\.php\/sid\/(.*?)\/v.swf(.*)?/is', '\\1', $link);

        /* # link */
        /* http://v.youku.com/v_show/id_XMTM1NzI5NjM1Ng==.html?firsttime=270&from=y1.9-4 */
        $sid = preg_replace('/https?\:\/\/v\.youku\.com\/v\_show\/id\_(.*?)\.html\??(.*)?/is', '\\1', $sid);

        $conf = array();
        $conf['video_url'] = urlencode($link);
        $conf['client_id'] = $config['youku_client_id'];
        /* # 兼容player地址 */
        $conf['video_id'] = urlencode($sid);

        $_temp = array();
        foreach ($conf as $key => $value) {
            array_push($_temp, $key.'='.$value);
        }

        $url = $showBasicUrl.'?'.implode('&', $_temp);
        $data = file_get_contents($url);
        $data = json_decode($data, true);

        $return['title'] = $data['title'];
        $return['image_url'] = $data['thumbnail'];
        $return['flash_url'] = $data['player'];

        return $return;
    }

    /**
     * 根据土豆页面地址获取单条视频信息
     *
     * @return array
     * @author Medz Seven <lovevipdsw@vip.qq.com>
     **/
    public function getTudouOutsideVideoInfo($link)
    {
        $url = 'http://api.tudou.com/v6/tool/repaste';
        $config = config('common.video');

        $conf = array();
        $conf['app_key'] = $config['tudou_app_key'];
        $conf['url'] = urlencode($link);
        $conf['format'] = 'json';

        $config = array();
        foreach ($conf as $key => $value) {
            array_push($config, $key.'='.$value);
        }

        $url .= '?'.implode('&', $config);
        $data = file_get_contents($url);
        $data = json_decode($data, true);

        $return['title'] = $data['itemInfo']['title'];
        $return['image_url'] = $data['itemInfo']['bigPicUrl'];
        $return['flash_url'] = $data['itemInfo']['outerPlayerUrl'];

        return $return;
    }

    /**
     * 根据音悦台页面地址获取mv信息
     *
     * @return array
     * @author Medz Seven <lovevipdsw@vip.qq.com>
     **/
    public function getYinyuetaiOutsideVideoInfo($link)
    {
        $contents = file_get_contents($link);
        preg_match_all('/<[\s]*meta[\s]*property="?og\:([^>"]*)"?[\s]*content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

        $data = array();
        foreach ($match['0'] as $key => $value) {
            $data[$match['1'][$key]] = $match['2'][$key];
        }

        $return = array();
        $return['title'] = $data['title'];
        $return['image_url'] = $data['image'];
        $return['flash_url'] = $data['videosrc'];

        return $return;
    }

	/**
     * 获取外部视频信息
     *
     * @return array
     * @author Medz Seven <lovevipdsw@vip.qq.com>
     **/
    public function getOutsideVideoInfo($link, $host)
    {
        $return = array();
        switch (strtolower($host)) {
            // # 优酷
            case 'youku.com':
                $return = $this->getYoukuOutsideVideoInfo($link);
                break;

            // # 土豆
            case 'tudou.com':
                $return = $this->getTudouOutsideVideoInfo($link);
                break;

            // # 音悦台
            case 'yinyuetai.com':
                $return = $this->getYinyuetaiOutsideVideoInfo($link);
                break;

            default:
                $return = null;
                break;
        }

        isset($return['image_url']) and $return['image_url'] = saveImageToLocal($return['image_url']); // # 图片本地化！

        return $return;
    }
	//此代码需要持续更新.视频网站有变动.就得修改代码.
    public function _video_getflashinfo($link, $host)
    {
        return $this->getOutsideVideoInfo($link, $host);

        $return = array();
        if ($host == 'youku.com') {
            preg_match('/id_([\w\-=]+)/i', $link, $matchs);
            if (!empty($matchs[1])) {
                $videoId = $matchs[1];
                $jsonData = file_get_contents("http://v.youku.com/player/getPlayList/VideoIDS/{$videoId}/timezone/+08/version/5/source/out?password=&ran=2513&n=3");
                $data = @json_decode($jsonData, true);
                if (!empty($data['data'][0])) {
                    $img = isset($data['data'][0]['logo']) ? $data['data'][0]['logo'] : null;
                    $title = isset($data['data'][0]['title']) ? $data['data'][0]['title'] : null;
                    $videoId = isset($data['data'][0]['vidEncoded']) ? $data['data'][0]['vidEncoded'] : null;
                    if ($videoId) {
                        $flash_url = "http://player.youku.com/player.php/sid/{$videoId}/v.swf";
                    }
                }
            }
        } else {
            if (extension_loaded('zlib')) {
                $content = file_get_contents('compress.zlib://'.$link);//获取
            }

            if (!$content) {
                $content = file_get_contents($link);
            }//有些站点无法获取
        }

        if ('ku6.com' == $host) {
            // 2012/3/7 修复ku6链接和图片抓取
            preg_match("/\/([\w\-\.]+)\.html/", $link, $flashvar);
            //preg_match("/<span class=\"s_pic\">(.*?)<\/span>/i",$content,$img);
            preg_match('/cover: "(.+?)"/i', $content, $img);
            preg_match("/<title>(.*?)<\/title>/i", $content, $title);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = 'http://player.ku6.com/refer/'.$flashvar[1].'/v.swf';
        } elseif ('tudou.com' == $host && strpos($link, 'www.tudou.com/albumplay') !== false) {
            preg_match("/albumplay\/([\w\-\.]+)\//", $link, $flashvar);
            preg_match("/<title>(.*?)<\/title>/i", $content, $title);
            preg_match('/pic: "(.+?)"/i', $content, $img);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = 'http://www.tudou.com/a/'.$flashvar[1].'/&autoPlay=true/v.swf';
        } elseif ('tudou.com' == $host && strpos($link, 'www.tudou.com/programs') !== false) {
            //dump(auto_charset($content,'GBK','UTF8'));
            preg_match("/programs\/view\/([\w\-\.]+)\//", $link, $flashvar);
            preg_match("/<title>(.*?)<\/title>/i", $content, $title);
            preg_match("/pic: \'(.+?)\'/i", $content, $img);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = 'http://www.tudou.com/v/'.$flashvar[1].'/&autoPlay=true/v.swf';
        } elseif ('tudou.com' == $host && strpos($link, 'www.tudou.com/listplay') !== false) {
            //dump(auto_charset($content,'GBK','UTF8'));
            preg_match("/listplay\/([\w\-\.]+)\//", $link, $flashvar);
            preg_match("/<title>(.*?)<\/title>/i", $content, $title);
            preg_match('/pic:"(.+?)"/i', $content, $img);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = 'http://www.tudou.com/l/'.$flashvar[1].'/&autoPlay=true/v.swf';
        } elseif ('tudou.com' == $host && strpos($link, 'douwan.tudou.com') !== false) {
            //dump(auto_charset($content,'GBK','UTF8'));
            preg_match("/code=([\w\-\.]+)$/", $link, $flashvar);
            preg_match('/title":"(.+?)"/i', $content, $title);
            preg_match('/itempic":"(.+?)"/i', $content, $img);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = 'http://www.tudou.com/v/'.$flashvar[1].'/&autoPlay=true/v.swf';
        } elseif ('youtube.com' == $host) {
            preg_match('/http:\/\/www.youtube.com\/watch\?v=([^\/&]+)&?/i', $link, $flashvar);
            preg_match('/<link itemprop="thumbnailUrl" href="(.+?)">/i', $content, $img);
            preg_match("/<title>(.*?)<\/title>/", $content, $title);
            $flash_url = 'http://www.youtube.com/embed/'.$FLASHVAR[1];
        } elseif ('sohu.com' == $host) {
            preg_match('/og:videosrc" content="(.+?)"/i', $content, $flashvar);
            preg_match('/og:title" content="(.+?)"/i', $content, $title);
            preg_match('/og:image" content="(.+?)"/i', $content, $img);
            $title[1] = iconv('GBK', 'UTF-8', $title[1]);
            $flash_url = $flashvar[1];
        } elseif ('qq.com' == $host) {
            preg_match('/vid:"(.+?)",/i', $content, $flashvar);
            preg_match('/itemprop=\"image\" content=\"(.+?)\"/i', $content, $img);
            preg_match("/<title>(.*?)<\/title>/", $content, $title);
            $flash_url = 'http://static.video.qq.com/TPout.swf?vid='.$flashvar[1].'&auto=1';
        } elseif ('sina.com.cn' == $host) {
            preg_match("/swfOutsideUrl:\'(.+?)\'/i", $content, $flashvar);
            preg_match("/pic\:[ ]*\'(.*?)\'/i", $content, $img);
            preg_match("/<title>(.*?)<\/title>/i", $content, $title);
            $flash_url = $flashvar[1];
        } elseif ('yinyuetai.com' == $host) {
            preg_match("/video\/([\w\-]+)$/", $link, $flashvar);
            preg_match("/<meta property=\"og:image\" content=\"(.*)\"\/>/i", $content, $img);
            preg_match("/<meta property=\"og:title\" content=\"(.*)\"\/>/i", $content, $title);
            $flash_url = 'http://player.yinyuetai.com/video/player/'.$flashvar[1].'/v_0.swf';
            $base = base64_encode(file_get_contents($img[1]));
            $img[1] = 'data:image/jpeg;base64,'.$base;
        }

        $return['title'] = is_array($title) ? t($title[1]) : $title;
        $return['flash_url'] = t($flash_url);
        $return['image_url'] = is_array($img) ? t($img[1]) : $img;

        return $return;
    }

	public function _weiboTypePublish($type_data)
    {
        $link = $type_data;
        $parseLink = parse_url($link);
        if (preg_match('/(youku.com|youtube.com|qq.com|ku6.com|sohu.com|sina.com.cn|tudou.com|yinyuetai.com)$/i', $parseLink['host'], $hosts)) {
            $flashinfo = $this->_video_getflashinfo($link, $hosts[1]);
        }
        if ($flashinfo['flash_url']) {
            $typedata['flashvar'] = $flashinfo['flash_url'];
            $typedata['flashimg'] = $flashinfo['image_url'];
            $typedata['host'] = $hosts[1];
            $typedata['source'] = $type_data;
            $typedata['title'] = $flashinfo['title'];
        }

        return $typedata;
    }
    

}

