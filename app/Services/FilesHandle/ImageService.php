<?php
	
namespace Hifone\Services\FilesHandle;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class ImageService{

	public function uploadImage ($file,$folderName = '')
	{
		 $allowed_extensions = ['png', 'jpg', 'gif'];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            $data = ['code' => 201,'error' => '只能上传 png, jpg or gif 格式图片' ];
        }

        $fileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension() ?: 'png';
        $folderName = $folderName ? $folderName : '/uploads/images/'.Auth::user()->id.'/'.date('Ym', time()).'/'.date('d', time());
        $destinationPath = public_path().'/'.$folderName;
        $safeName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $safeName);

        // If is not gif file, we will try to reduse the file size
        if ($file->getClientOriginalExtension() != 'gif') {
            // open an image file
            $img = Image::make($destinationPath.'/'.$safeName);
            // prevent possible upsizing
            $img->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // finally we save the image as a new file
            $img->save();
        }
		$data['code'] = 200;
        $data['filename'] = $folderName.'/'.$safeName;
        return $data ;
	}
	
}