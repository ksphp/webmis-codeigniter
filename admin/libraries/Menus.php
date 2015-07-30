<?php
	class Menus{
		function getMenu($type = "",$lang=''){
			$data['lang'] = array('en-us'=>'English','zh-cn'=>'简体中文');
			if($lang=='zh-cn'){
				$data['adminState'] = array('<span class="c999">未提交</span>','<span class="green">通过</span>','<span class="red">未通过</span>','<span class="red">审核中</span>');
			}else{
				$data['adminState'] = array('<span class="c999">Not Submit</span>','<span class="green">PASS</span>','<span class="red">NotPass</span>','<span class="red">Auditing</span>');
			}
			return $data[$type];
		}
	}