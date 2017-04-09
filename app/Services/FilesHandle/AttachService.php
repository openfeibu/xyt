<?php
	
namespace Hifone\Services\FilesHandle;

use Auth;
use Hifone\Models\Attach;
use Hifone\Services\FilesHandle\UploadFileService as UploadFileService;

class AttachService{

	public function upload($data = null, $input_options = null, $thumb = false)
	{
		 //echo json_encode($data);
        $system_default = config('system_config.attach');
        if (empty($system_default['attach_path_rule']) || empty($system_default['attach_max_size']) || empty($system_default['attach_allow_extension'])) {
            $system_default['attach_path_rule'] = 'Y/md/H/';
            $system_default['attach_max_size'] = '2';        // 默认2M
            $system_default['attach_allow_extension'] = 'jpg,gif,png,jpeg,bmp,zip,rar,doc,xls,ppt,docx,xlsx,pptx,pdf';
            model('Xdata')->put('admin_Config:attach', $system_default);
        }

        // 上传若为图片，则修改为图片配置
        if ($data['upload_type'] === 'image') {
            $image_default = config('system_config.attachimage');
            $system_default['attach_max_size'] = $image_default['attach_max_size'];
            $system_default['attach_allow_extension'] = $image_default['attach_allow_extension'];
            $system_default['auto_thumb'] = $image_default['auto_thumb'];
        }

        // 载入默认规则
        $default_options = array();
         $default_options['auto_thumb'] = $system_default['auto_thumb']; 
        $default_options['custom_path'] = date($system_default['attach_path_rule']);                    // 应用定义的上传目录规则：'Y/md/H/'
        $default_options['max_size'] = floatval($system_default['attach_max_size']) * 1024 * 1024;        // 单位: 兆
        $default_options['allow_exts'] = $system_default['attach_allow_extension'];                    // 'jpg,gif,png,jpeg,bmp,zip,rar,doc,xls,ppt,docx,xlsx,pptx,pdf'
        $default_options['save_path'] = public_path().'/uploads/images/'.$default_options['custom_path'];
        $default_options['save_name'] = ''; //指定保存的附件名.默认系统自动生成
        $default_options['save_to_db'] = true;
        //echo json_encode($default_options);exit;

        // 定制化设这，覆盖默认设置
        $options = is_array($input_options) ? array_merge($default_options, $input_options) : $default_options;
        //云图片
        if ($data['upload_type'] == 'image') {
            return $this->localUpload($options);
        }
	}
	 private function localUpload($options)
    {
        // 初始化上传参数
        $upload = new UploadFileService($options['max_size'], $options['allow_exts'], '');
        // 设置上传路径
        $upload->savePath = $options['save_path'];
        // 启用子目录
        $upload->autoSub = false;
        // 保存的名字
        $upload->saveName = $options['save_name'];
        // 默认文件名规则
        $upload->saveRule = isset($options['save_rule']) ? $options['save_rule'] : '';
        // 是否缩略图
        if ($options['auto_thumb'] == 1) {
            $upload->thumb = true;
        }

        /*// 创建目录
        mkdir($upload->save_path, 0777, true);*/

        // 执行上传操作
        if (!$upload->upload()) {
            // 上传失败，返回错误
            $return['status'] = false;
            $return['info'] = $upload->getErrorMsg();

            return $return;
        } else {
            $upload_info = $upload->getUploadFileInfo();
            // 保存信息到附件表
            $data = $this->saveInfo($upload_info, $options);
            // 输出信息
            $return['status'] = true;
            $return['info'] = $data;
            // 上传成功，返回信息
            return $return;
        }
    }
     private function saveInfo($upload_info, $options)
    {
        $data = array(
            'table' => '',
            'row_id' => 0,
            'app_name' => '',
            'attach_type' => t($options['attach_type']),
            'user_id' => isset($data['user_id']) ? $data['user_id'] : Auth::id(),
            'private' => isset($data['private']) && $data['private'] > 0 ? 1 : 0,
            'from' => isset($data['from']) ? intval($data['from']) : getVisitorClient(),
        );
        if (isset($options['save_to_db']) && $options['save_to_db']) {
            foreach ($upload_info as $u) {
                $name = t($u['name']);
                $data['name'] = $name ? $name : $u['savename'];
                $data['type'] = $u['type'];
                $data['size'] = $u['size'];
                $data['extension'] = strtolower($u['extension']);
                $data['hash'] = $u['hash'];
                $data['save_path'] = $options['custom_path'];
                $data['save_name'] = $u['savename'];
                $attach = Attach::create($data);
                $data['attach_id'] = intval($attach->id);
                $data['key'] = $u['key'];
                $data['size'] = byte_format($data['size']);
                $infos[] = $data;
                unset($data['attach_id']);
                unset($data['key']);
                unset($data['size']);
            }
        } else {
            foreach ($upload_info as $u) {
                $name = t($u['name']);
                $data['name'] = $name ? $name : $u['savename'];
                $data['type'] = $u['type'];
                $data['size'] = byte_format($u['size']);
                $data['extension'] = strtolower($u['extension']);
                $data['hash'] = $u['hash'];
                $data['save_path'] = $options['custom_path'];
                $data['save_name'] = $u['savename'];
                //$data['save_domain'] = C('ATTACH_SAVE_DOMAIN'); 	//如果做分布式存储，需要写方法来分配附件的服务器domain
                $data['key'] = $u['key'];
                $infos[] = $data;
            }
        }

        return $infos;
    }
    public function getAttachByIds($ids)
    {
	    $data = [];
        foreach ($ids as $key => $id) {
            $ids[$key] = intval($id);
            if ($ids[$key] <= 0) {
                unset($ids[$key]);
            }
        }
        if (empty($ids)) {
            return null;
        }

        $name = 'attach_ids_'.md5(json_encode($ids));

      //  $data = S($name);
        if (!$data) {
            if (empty($ids)) {
                return false;
            }
            !is_array($ids) && $ids = explode(',', $ids);
            
            $data = app(Attach::class)->whereIn('id',$ids)->recent()->get();
            S($name, $data);
        }

        return $data;
    }
}