<?php
class Index_c extends MY_Controller {

	public function index(){
		$this->load->helper('my');
		
		/* 测试数据 */
		$data['test'] = '<h4>使用说明</h4>';
		$data['test'] .= "\t".'WEBMIS是PHP底层开发系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，tinymce编辑器等插件、实现简洁、美观的弹框效果！<br/><br/>'."\n";
		$data['test'] .= '<p><b>一、下载</b><br/>';
		$data['test'] .= '1、<a href="https://github.com/ksphp/webmis" target="_blank" title="点击下载"><b>点击进入下载页面</b></a>(点击右下角的“ZIP”图标下载)；</p>';
		$data['test'] .= '2、点击下面链接直接下载<br/>';
		$data['test'] .= '<div class="github-widget" style="margin:10px 0;" data-repo="ksphp/webmis"></div>';
		$data['test'] .= '<p><b>二、安装</b><br/>';
		$data['test'] .= '文件解压到网站跟目录；</p>';
		$data['test'] .= '<p><b>方法一：安装向导</b><br/>';
		$data['test'] .= '<a href="'.base_url('install').'" >'.base_url('install').'</a></p>';
		$data['test'] .= '<p><b>方法二：手动安装</b><br/>';
		$data['test'] .= '（1）创建数据库、导入“install”下的“webmis.sql”数据库文件；<br/>';
		$data['test'] .= '（2）修改数据库配置文件；<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理后台：admin/app/config/database.php<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站前台：web/config/database.php</br>';
		$data['test'] .= '（3）修改 “/” 根目录和 “/admin” 下面的 .htaccess 文件（必须支持重写）；<br/></p>';
		$data['test'] .= '<p><b>三、测试</b><br/>';
		$data['test'] .= '网站前台：<a href="'.base_url().'" >'.base_url().'</a><br/>';
		$data['test'] .= '管理员后台：<a href="'.base_url('admin').'" >'.base_url('admin').'</a> (默认帐号：admin 密码：admin)</p>';
		$data['test'] .= '<p><b>四、目录说明</b><br/>';
		$data['test'] .= 'admin-----------------------------<b>后台管理</b><br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;app---------------------------CI项目目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;backup------------------------数据备份目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;js----------------------------后台数据处理的JS文件<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;.htaccess---------------------后台重写文件、屏蔽index.php<br/>';
		$data['test'] .= 'install---------------------------安装向导<br/>';
		$data['test'] .= 'public----------------------------网站前台公共目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;css---------------------------样式目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;images------------------------图片目录<br/>';
		$data['test'] .= 'system----------------------------CI框架目录<br/>';
		$data['test'] .= 'upload----------------------------上传目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;web---------------------------网站上传文件<br/>';
		$data['test'] .= 'web-------------------------------<b>网站前台</b><br/>';
		$data['test'] .= 'webmis----------------------------前端样式插件<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;css---------------------------样式目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;images------------------------图片目录<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;js----------------------------JS插件<br/>';
		$data['test'] .= '&nbsp;&nbsp;&nbsp;&nbsp;plugin------------------------公共插件<br/>';
		$data['test'] .= 'index.php-------------------------接口文件<br/>';
		$data['test'] .= '.htaccess-------------------------前台重写文件、屏蔽index.php</p>';
		
		$this->MyView('index/index',$data);
	}
}
?>