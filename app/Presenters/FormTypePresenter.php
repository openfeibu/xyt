<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Presenters;

class FormTypePresenter 
{
	public function showSelect ($data = array(),$name,$value = '',$class = '' )
	{
		$html = "<select name='".$name."' id='".$name."' class='".$class."' > ";
		if(isset($data[$name]['value']))
		{
			foreach( $data[$name]['value'] as $k => $v )
			{
				if($k == $value )
				{
					$html .= "<option value='".$k."' selected>".$v."</option>";
				}else{
					$html .= "<option value='".$k."'>".$v."</option>";
				}
			}
		}
		$html .= "</select>";
		return $html;
	}	
}