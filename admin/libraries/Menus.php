<?php
	class Menus{
		function getMenu($type = ""){
			$data['adminState'] = array('<span class="c999">未提交</span>','<span class="green">通过</span>','<span class="red">未通过</span>','<span class="red">未审核</span>');
			return $data[$type];
		}
	}
?>