<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Models;

use Auth;

use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
	protected $table = 'report';

	public static function addReport($type,$content,$type_id){
		$report = new Report;
		$report->user_id = Auth::user()->id;
		$report->type = $type;
		$report->type_id = $type_id;
		$report->content = $content;
		if($report->save()){
			return true;
		}else{
			return false;
		}
		
	}

}
