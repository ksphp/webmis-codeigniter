<?php
	class Menus{
		function getMenu($type = "",$lang=''){
			if($lang=='zh-cn'){
				$data['adminState'] = array('<span class="c999">未提交</span>','<span class="green">通过</span>','<span class="red">未通过</span>','<span class="red">审核中</span>');
			}else{
				$data['adminState'] = array('<span class="c999">Not Submit</span>','<span class="green">Pass</span>','<span class="red">Not Pass</span>','<span class="red">Auditing</span>');
			}
			return $data[$type];
		}
	}