<?php

namespace Hifone\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class SensitiveWord extends Model
{
    protected $table = 'sensitive_word';

	public static function checkedContent ($content)
	{

		$list = DB::table('sensitive_word')->get();
		
        $ban = array();
        $replace = array();
        $audit = array();

        foreach ($list as $value) {
            switch ($value->type) {
                case 1:
                    $ban[$value->word] = '';
                    break;
                case 2:
                    $audit[$value->word] = '';
                    break;
                case 3:
                    $replace[$value->word] = $value['replace'];
                    break;
            }
            
        }

        if (!empty($ban) && strlen(strtr($content, $ban)) < strlen($content)) {
            return array('status' => false, 'type' => 1, 'data' => 'ÄÚÈİÖĞ°üº¬½ûÖ¹´Ê»ã');
        }

        !empty($replace) && $content = strtr($content, $replace);

        if (!empty($audit) && strlen(strtr($content, $audit)) < strlen($content)) {
            return array('status' => true, 'type' => 2, 'data' => $content);
        }

        return array('status' => true, 'type' => 3, 'data' => $content);
 
	}
    
}
