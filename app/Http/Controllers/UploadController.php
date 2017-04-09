<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Http\Controllers;

use Hifone\Commands\Image\UploadImageCommand;
use Input;

class UploadController extends Controller
{
    public function uploadImage()
    {
        if ($file = Input::file('file')) {
            $data = dispatch(new UploadImageCommand($file));
        } else {
            $data['error'] = '上传失败';
        }

        return $data;
    }
    public function uploadNewImage()
    {
        if ($file = Input::file('upload')) {
            $data = app('imageService')->uploadImage($file);           
        } else {
	        $data['code'] = 201;
            $data['error'] = '上传失败';
        }
		if($data['code'] == 200){
			$callback = Input::get("CKEditorFuncNum"); 
			return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$data['filename']."','');</script>";
		}
		else{
			return $data['error'];
		}
    }
    public function save ()
    {
    	$data['attach_type'] = t(Input::get('attach_type'));
        $data['upload_type'] = Input::get('upload_type') ? t(Input::get('upload_type')) : 'file';

        $thumb = intval(Input::get('thumb'));
        $width = intval(Input::get('width'));
        $height = intval(Input::get('height'));
        $cut = intval(Input::get('cut'));

        $option['attach_type'] = $data['attach_type'];
        $info = app('attachService')->upload($data, $option);

        if ($info['status']) {
            $data = $info['info'][0];
            if ($thumb == 1) {
                $data['src'] = getImageUrl($data['save_path'].$data['save_name'], $width, $height, $cut);
            } else {
                $data['src'] = $data['save_path'].$data['save_name'];
            }

            $data['extension'] = strtolower($data['extension']);
            $return = array('status' => 1, 'data' => $data);
        } else {
            $return = array('status' => 0, 'data' => $info['info']);
        }

        $isAjaxUrl = Input::get('isAjaxUrl') != null ? true : false;
        if ($isAjaxUrl) {
            $editorId = t(Input::get('editorid'));
            $ajaxInfo = array();
            if ($thumb == 1) {
                $ajaxInfo['url'] = getImageUrl($return['data']['save_path'].$return['data']['save_name'], $width, $height, $cut);
            } else {
                $ajaxInfo['url'] = getImageUrl($return['data']['save_path'].$return['data']['save_name']);
            }

            if (Input::get('getUrl') == 1) {
                ob_end_clean();
                echo $ajaxInfo['url'];
                ob_end_flush();
                exit;
            }

            $ajaxInfo['state'] = 'SUCCESS';
            echo "<script>parent.EditorList['".$editorId."'].getWidgetCallback('image')('".$ajaxInfo[ 'url' ]."','".$ajaxInfo[ 'state' ]."')</script>";
        } else {
            echo json_encode($return);
            exit();
        }
    }
}
