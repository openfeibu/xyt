<?php

namespace Hifone\Services\FilesHandle;

class UploadFileService
{
    //类定义开始

    // 上传文件的最大值
    public $maxSize = -1;

    // 是否支持多文件上传
    public $supportMulti = true;

    // 允许上传的文件后缀
    //  留空不作后缀检查
    public $allowExts = array();

    // 允许上传的文件类型
    // 留空不做检查
    public $allowTypes = array();

    // 使用对上传图片进行缩略图处理
    public $thumb = false;
    // 缩略图最大宽度
    public $thumbMaxWidth;
    // 缩略图最大高度
    public $thumbMaxHeight;
    // 缩略图前缀
    public $thumbPrefix = 'thumb_';
    public $thumbSuffix = '';
    // 缩略图保存路径
    public $thumbPath = '';
    // 缩略图文件名
    public $thumbFile = '';
    // 是否移除原图
    public $thumbRemoveOrigin = false;
    // 压缩图片文件上传
    public $zipImages = false;
    // 启用子目录保存文件
    public $autoSub = false;
    // 子目录创建方式 可以使用hash date
    public $subType = 'hash';
    public $dateFormat = 'Ymd';
    public $hashLevel = 1; // hash的目录层次
    // 上传文件保存路径
    public $savePath = '';
    public $saveName = '';
    public $autoCheck = true; // 是否自动检查附件
    // 存在同名是否覆盖
    public $uploadReplace = false;

    // 上传文件命名规则
    // 例如可以是 time uniqid com_create_guid 等
    // 必须是一个无需任何参数的函数名 可以使用自定义函数
    public $saveRule = '';

    // 上传文件Hash规则函数名
    // 例如可以是 md5_file sha1_file 等
    public $hashType = 'md5_file';

    // 错误信息
    private $error = '';

    // 上传成功的文件信息
    private $uploadFileInfo ;

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function __construct($maxSize = '', $allowExts = '', $allowTypes = '', $savePath = '', $saveRule = '')
    {
        if (!empty($maxSize) && is_numeric($maxSize)) {
            $this->maxSize = $maxSize;
        }
        if (!empty($allowExts)) {
            if (is_array($allowExts)) {
                $this->allowExts = array_map('strtolower', $allowExts);
            } else {
                $this->allowExts = explode(',', strtolower($allowExts));
            }
        }
        if (!empty($allowTypes)) {
            if (is_array($allowTypes)) {
                $this->allowTypes = array_map('strtolower', $allowTypes);
            } else {
                $this->allowTypes = explode(',', strtolower($allowTypes));
            }
        }
      
        $this->saveRule = $saveRule;


        $this->savePath = $savePath;
    }
	public static function open($maxSize = '', $allowExts = '', $allowTypes = '', $savePath = '', $saveRule = '')
    {
        return new self($maxSize = '', $allowExts = '', $allowTypes = '', $savePath = '', $saveRule = '');
    }
    /**
     +----------------------------------------------------------
     * 上传一个文件
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param mixed  $name  数据
     * @param string $value 数据表名
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     * @throws ThinkExecption
     +----------------------------------------------------------
     */
    private function save($file)
    {
        $filename = $file['savepath'].$file['savename'];
        if (!$this->uploadReplace && is_file($filename)) {
            // 不覆盖同名文件
            $this->error = '文件已经存在！'.$filename;

            return false;
        }
        $saveFileName = auto_charset($filename, 'utf-8', 'gbk');
        if (!move_uploaded_file($file['tmp_name'], $saveFileName)) {
            $this->error = '文件上传保存错误！';

            return false;
        }
        if ($this->thumb) { //是否主动生成缩略图 不建议开启
            getThumbImage($saveFileName, 800, 800, false, true);
            // getThumbImage($saveFileName,100,100);
            // getThumbImage($saveFileName,300,300);
        }
        /*if ($this->zipImags) {
            // TODO 对图片压缩包在线解压
        }*/

        //由于很多时候，后台不需要水印，所以需要水印的在应用中自己实现，参考如下代码
        //require_cache(SITE_PATH."/addons/library/WaterMark/WaterMark.class.php");
        //WaterMark::iswater($filename);

        return true;
    }

    /**
     +----------------------------------------------------------
     * 上传文件
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $savePath 上传文件保存路径
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     * @throws ThinkExecption
     +----------------------------------------------------------
     */
    public function upload($savePath = '')
    {
       
        //如果不指定保存文件名，则由系统默认
        if (empty($savePath)) {
            $savePath = $this->savePath;
        }else{
	         mkdir($savePath, 0777, true);
        }
        // 检查上传目录
        if (!is_dir($savePath)) {
            // 检查目录是否编码后的
            if (is_dir(base64_decode($savePath))) {
                $savePath = base64_decode($savePath);
            } else {
                // 尝试创建目录
                if (!mkdir($savePath, 0777, true)) {
                    $this->error = '上传目录'.$savePath.'不存在';

                    return false;
                }
            }
        } else {
            if (!is_writeable($savePath)) {
                $this->error = '上传目录'.$savePath.'不可写';

                return false;
            }
        }
        $fileInfo = array();
        $isUpload = false;

        // 获取上传的文件信息
        // 对$_FILES数组信息处理
        $files = $this->dealFiles($_FILES);

        foreach ($files as $key => $file) {
            //过滤无效的上传
            if (!empty($file['name'])) {
                $file['key'] = $key;
                $file['extension'] = $this->getExt($file['name']);
                $file['savepath'] = $savePath;
                $file['savename'] = uniqid().substr(str_shuffle('0123456789abcdef'), rand(0, 9), 7).'.'.$file['extension'];
                //$this->getSaveName($file);

                /*if ($GLOBALS['fromMobile'] == true && empty($file['extension'])) {
                    //移动设备上传的无后缀的图片，默认为jpg
                        $file['extension'] = 'jpg';
                    $file['savename'] = trim($file['savename'], '.').'.jpg';
                } else {*/
                    // 自动检查附件
                    if ($this->autoCheck) {
                        if (!$this->check($file)) {
                            return false;
                        }
                    }
              /*  }*/

                //保存上传文件
                if (!$this->save($file)) {
                    return false;
                }
                if (function_exists($this->hashType)) {
                    $fun = $this->hashType;
                    $file['hash'] = $fun(auto_charset($file['savepath'].$file['savename'], 'utf-8', 'gbk'));
                }
                //上传成功后保存文件信息，供其它地方调用
                unset($file['tmp_name'], $file['error']);
                $fileInfo[] = $file;
                $isUpload = true;
                //图片上传裁剪
                //$this->resetimg($savePath,$file['savename'],$file['save_Path']);
            }
        }
        if ($isUpload) {
            $this->uploadFileInfo = $fileInfo;

            return true;
        } else {
            $this->error = '上传出错！文件不符合上传要求。';

            return false;
        }
    }

    /**
     +----------------------------------------------------------
     * 转换上传文件数组变量为正确的方式
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param array $files 上传的文件变量
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
     */
    private function dealFiles($files)
    {
        $fileArray = array();
        foreach ($files as $file) {
            if (is_array($file['name'])) {
                $keys = array_keys($file);
                $count = count($file['name']);
                for ($i = 0; $i < $count; $i++) {
                    foreach ($keys as $key) {
                        $fileArray[$i][$key] = $file[$key][$i];
                    }
                }
            } else {
                $fileArray = $files;
            }
            break;
        }

        return $fileArray;
    }

    /**
     +----------------------------------------------------------
     * 获取错误代码信息
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $errorNo 错误号码
     +----------------------------------------------------------
     +----------------------------------------------------------
     * @throws ThinkExecption
     +----------------------------------------------------------
     */
    protected function error($errorNo)
    {
        switch ($errorNo) {
            case 1:

                $size = ini_get('upload_max_filesize');
                if (strpos($size, 'M') !== false || strpos($size, 'm') !== false) {
                    $size = intval($size) * 1024;
                    $size = byte_format($size);
                }
                //edit by  yangjs
                if (isset($this->maxSize) && !empty($this->maxSize)) {
                    $size = byte_format($this->maxSize);
                }
                $this->error = '上传文件大小不符，文件不能超过 '.$size;
                break;
            case 2:
                 $size = ini_get('upload_max_filesize');
                if (strpos($size, 'M') !== false || strpos($size, 'm') !== false) {
                    $size = intval($size) * 1024;
                    $size = byte_format($size);
                }
                //edit by  yangjs
                if (isset($this->maxSize) && !empty($this->maxSize)) {
                    $size = byte_format($this->maxSize);
                }

                $this->error = '上传文件大小不符，文件不能超过 '.$size;
                break;
            case 3:
                $this->error = '文件只有部分被上传';
                break;
            case 4:
                $this->error = '没有文件被上传';
                break;
            case 6:
                $this->error = '找不到临时文件夹';
                break;
            case 7:
                $this->error = '文件写入失败';
                break;
            default:
                $this->error = '未知上传错误！';
        }

        return ;
    }

    /**
     +----------------------------------------------------------
     * 根据上传文件命名规则取得保存文件名
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param string $filename 数据
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    private function getSaveName($filename)
    {
        if ($this->saveName) {
            return $this->saveName;
        } else {
            $rule = $this->saveRule;
            if (empty($rule)) {
                //没有定义命名规则，则保持文件名不变
                $saveName = $filename['name'];
            } else {
                if (function_exists($rule)) {
                    //使用函数生成一个唯一文件标识号
                    $saveName = $rule().'.'.$filename['extension'];
                } else {
                    //使用给定的文件名作为标识号
                    $saveName = $rule.'.'.$filename['extension'];
                }
            }
            if ($this->autoSub) {
                // 使用子目录保存文件
                $saveName = $this->getSubName($filename).'/'.$saveName;
            }

            return $saveName;
        }
    }

    /**
     +----------------------------------------------------------
     * 获取子目录的名称
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param array $file 上传的文件信息
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    private function getSubName($file)
    {
        switch ($this->subType) {
            case 'date':
                $dir = date($this->dateFormat, time());
                break;
            case 'hash':
            default:
                $name = md5($file['savename']);
                $dir = '';
                for ($i = 0;$i < $this->hashLevel;$i++) {
                    $dir   .=  $name{0}
                    .'/';
                }
                break;
        }
        if (!is_dir($file['savepath'].$dir)) {
            mk_dir($file['savepath'].$dir);
        }

        return $dir;
    }

    /**
     +----------------------------------------------------------
     * 检查上传的文件
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param array $file 文件信息
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function check($file)
    {
        if ($file['error'] !== 0) {
            //文件上传失败
            //捕获错误代码
            $this->error($file['error']);

            return false;
        }
        //文件上传成功，进行自定义规则检查
        //检查文件大小
        if (!$this->checkSize($file['size'])) {
            $this->error = '上传文件大小不符,文件不能超过 '.byte_format($this->maxSize);

            return false;
        }

        //检查文件Mime类型
        if (!$this->checkType($file['type'])) {
            $this->error = '上传文件MIME类型不允许！';

            return false;
        }
        //检查文件类型
        if (!$this->checkExt($file['extension'])) {
            $this->error = '上传文件类型不允许';

            return false;
        }

        //检查是否合法上传
        if (!$this->checkUpload($file['tmp_name'])) {
            $this->error = '非法上传文件！';

            return false;
        }

        return true;
    }

    /**
     +----------------------------------------------------------
     * 检查上传的文件类型是否合法
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param string $type 数据
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function checkType($type)
    {
        if (!empty($this->allowTypes)) {
            return in_array(strtolower($type), $this->allowTypes);
        }

        return true;
    }

    /**
     +----------------------------------------------------------
     * 检查上传的文件后缀是否合法
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param string $ext 后缀名
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function checkExt($ext)
    {
        if (in_array($ext, array('php', 'php3', 'exe', 'sh', 'html', 'asp', 'aspx'))) {
            $this->error = '不允许上传可执行的脚本文件，如：php、exe、html后缀的文件';

            return false;
        }

        if (!empty($this->allowExts)) {
            return in_array(strtolower($ext), $this->allowExts, true);
        }

        return true;
    }

    /**
     +----------------------------------------------------------
     * 检查文件大小是否合法
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param int $size 数据
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function checkSize($size)
    {
        return !($size > $this->maxSize) || (-1 == $this->maxSize);
    }

    /**
     +----------------------------------------------------------
     * 检查文件是否非法提交
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param string $filename 文件名
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function checkUpload($filename)
    {
        return is_uploaded_file($filename);
    }

    /**
     +----------------------------------------------------------
     * 取得上传文件的后缀
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @param string $filename 文件名
     +----------------------------------------------------------
     * @return bool
     +----------------------------------------------------------
     */
    private function getExt($filename)
    {
        $pathinfo = pathinfo($filename);

        return $pathinfo['extension'];
    }

    /**
     +----------------------------------------------------------
     * 取得上传文件的信息
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
     */
    public function getUploadFileInfo()
    {
        return $this->uploadFileInfo;
    }

    /**
     +----------------------------------------------------------
     * 取得最后一次错误信息
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    public function getErrorMsg()
    {
        return $this->error;
    }

    /**
     +----------------------------------------------------------
     * 重置图片大小尺寸
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    public function resetimg($savePath, $image_name, $save_path)
    {
        $file_path = date('/Y/md/H/');
        $filename = UPLOAD_URL.$file_path.$image_name; //将URL转化为本地地址

        $oldimageinfo = getimagesize($filename);
        $w = intval($oldimageinfo[0]);
        $h = intval($oldimageinfo[1]);
        $type = intval($oldimageinfo[2]);

        switch ($type) {
            case 2:
                $image = imagecreatefromjpeg($filename);
                break;
            case 1:
                $image = imagecreatefromgif($filename);
                break;
            case 3:
                $image = imagecreatefrompng($filename);
                imagesavealpha($image, true);
                break;
        }
        if ($image) {
            if ($w <= 1000 && $w) {
            } elseif ($w) {
                $temp = 1000 / $w;
                $width = 1000;
                $height = floor($h * $temp);

                $image_p = imagecreatetruecolor($width, $height);
                imagealphablending($image_p, false);
                imagesavealpha($image_p, true);
                $res = imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                $size = filesize($filename);
                $real = 500 * 1024;
                if ($size > $real) {
                    $temp = sqrt($real / $size);
                    $width = floor($width * $temp);
                    $height = floor($height * $temp);
                    $image_p = imagecreatetruecolor($width, $height);
                    imagealphablending($image_p, false);
                    imagesavealpha($image_p, true);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                }
                $ii = imagejpeg($image_p, $savePath.$image_name);
                imagedestroy($image_p);
                imagedestroy($image);
            }
        }
    }
}//类定义结束
;
