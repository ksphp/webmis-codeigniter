<?php
use \VisualAppeal\AutoUpdate;
class Sys_config extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('system/sys_config',$this->Lang);
		$this->load->helper('my');
		$this->load->library('inc');
		$this->load->helper('file');
		/* URL */
		$url = explode(':', base_url());
		$data['URL'] = $url[0].'://'.$_SERVER['SERVER_NAME'].'/';
		/* Admin Themes */
		$data['admin_themes'] = get_dir_file_info('../themes/admin');
		/* WebMIS Themes */
		$data['webmis_themes'] = get_dir_file_info('../webmis/themes');
		/* Language */
		$data['lang'] = get_dir_file_info('language');

		$data['js'] = array('system/sys_config.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'system/config/index_mo',$data);
		}else {
			$this->inc->adminView($this,'system/config/index',$data);
		}
	}
	/* Edit */
	public function editData(){
		$title = $this->input->post('title');
		$copy = $this->input->post('copy');
		$backup = $this->input->post('backup');
		$admin_themes = $this->input->post('admin_themes');
		$webmis_themes = $this->input->post('webmis_themes');
		$lang = $this->input->post('lang');
		$_SESSION['AdminInfo']['lang'] = $lang;
		// Change Config File
		$data = array('title'=>$title,'copy'=>$copy,'backup'=>$backup,'admin_themes'=>$admin_themes,'webmis_themes'=>$webmis_themes,'language'=>$lang);
		$result = $this->_Cinfig($data);
		$this->lang->load('msg',$this->Lang);
		echo $result?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';

	}
	private function _Cinfig($data=''){
		if($data){
			$file = 'config/config.php';
			$ct = @file_get_contents($file);
			if($ct){
				foreach ($data as $key=>$val){
					$pat = "/\['".$key."'\] = '(.*)'/";
					$rep = "['".$key."'] = '".$val."'";
					$ct = preg_replace($pat,$rep,$ct);
				}
				/* Write */
				$fp=fopen($file,'w');
				fwrite($fp,$ct);
				fclose($fp);
				return TRUE;
			}else{return FALSE;}
		}else{return FALSE;}
	}
	// Update System
	function update($name='system'){
		require APPPATH.'third_party/update/vierbergenlars/SemVer/expression.php';
		require APPPATH.'third_party/update/vierbergenlars/SemVer/version.php';
		require APPPATH.'third_party/update/Psr/Log/LoggerInterface.php';
		require APPPATH.'third_party/update/Monolog/Logger.php';
		require APPPATH.'third_party/update/Monolog/Formatter/FormatterInterface.php';
		require APPPATH.'third_party/update/Monolog/Formatter/NormalizerFormatter.php';
		require APPPATH.'third_party/update/Monolog/Formatter/LineFormatter.php';
		require APPPATH.'third_party/update/Monolog/Handler/HandlerInterface.php';
		require APPPATH.'third_party/update/Monolog/Handler/AbstractHandler.php';
		require APPPATH.'third_party/update/Monolog/Handler/AbstractProcessingHandler.php';
		require APPPATH.'third_party/update/Monolog/Handler/StreamHandler.php';
		require APPPATH.'third_party/update/Monolog/Handler/NullHandler.php';
		require APPPATH.'third_party/update/Desarrolla2/CacheInterface.php';
		require APPPATH.'third_party/update/Desarrolla2/Adapter/AdapterInterface.php';
		require APPPATH.'third_party/update/Desarrolla2/Adapter/AbstractAdapter.php';
		require APPPATH.'third_party/update/Desarrolla2/Adapter/NotCache.php';
		require APPPATH.'third_party/update/Desarrolla2/Adapter/File.php';
		require APPPATH.'third_party/update/Desarrolla2/Cache.php';
		require APPPATH.'third_party/update/AutoUpdate.php';
		
		// Config
		$this->lang->load('system/sys_config',$this->Lang);
		if($name=='system'){
			$RootDir = './';
			$UpdateUrl = 'http://ksphp.ksphp.cn/update/system';
			$Cache = 'update/cache_system';
			$LogFile = 'update/update_system.log';
			$VersionName = 'version';
			$Version = $this->config->config[$VersionName];
			$data['Name'] = $name;
			$data['Title'] = $this->lang->line('sys_config_system');
		}elseif($name=='webmis'){
			$RootDir = '../webmis/';
			$UpdateUrl = 'http://ksphp.ksphp.cn/update/webmis';
			$Cache = 'update/cache_webmis';
			$LogFile = 'update/update_webmis.log';
			$VersionName = 'version_webmis';
			$Version = $this->config->config[$VersionName];
			$data['Name'] = $name;
			$data['Title'] = $this->lang->line('sys_config_webmis');
		}
		
		$update = new AutoUpdate('update/temp', $RootDir, 60);
		$update->setCurrentVersion($Version);
		$update->setUpdateUrl($UpdateUrl);
		$update->addLogHandler(new Monolog\Handler\StreamHandler($LogFile));
		$update->setCache(new Desarrolla2\Cache\Adapter\File($Cache), 3600);
		// Check for a new update
		if ($update->checkUpdate() === false){
			// die('Could not check for updates! See log file for details.');
			$data['checkUpdate'] = '<span class="red"><b>'.$this->lang->line('sys_config_update_nofind').'</b></span>';
		}else{
			if($update->newVersionAvailable()){
				// var_dump(array_map(function($version) {return (string) $version;}, $update->getVersionsToUpdate()));
				$data['checkUpdate'] = '-> <b style="font-size: 14px; color: #666;">'.$update->getLatestVersion().'</b> <input type="submit" id="editSub" name="update" value="'.$this->lang->line('sys_config_update_sub').'" />';
			}else{
				$data['checkUpdate'] = '<span class="green"><b>'.$this->lang->line('sys_config_update_new').'</b></span>';
			}
		}
		// Update
		$sub = $this->input->post('update');
		$data['Msg'] = '';
		if(isset($sub)){
			$result = $update->update();
			if($result === true){
				$result = $this->_Cinfig(array($VersionName=>$update->getLatestVersion()));
				$data['Msg'] = '<span class="green"><b>'.$this->lang->line('sys_config_update_suc').'</b></span>';
				redirect('sys_config/update/'.$name);
			}else{
				$data['Msg'] = '<span class="red"><b>'.$this->lang->line('sys_config_update_err').' : '.$result.'</b></span>';
				// if ($result = AutoUpdate::ERROR_SIMULATE) {var_dump($update->getSimulationResults());}
			}
		}	
		// View
		$this->load->library('inc');
		$data['js'] = array('system/sys_config.js');
		$data['Log'] = nl2br(file_get_contents($LogFile));
		$data['LogFile'] = str_replace('./','',$LogFile);
		$data['VersionName'] = $VersionName;
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'system/config/update',$data);
	}
	
	// Clear Log
	function clearLog($name='system'){
		if($name){
			$LogFile = 'update/update_'.$name.'.log';
			$fp=fopen($LogFile,'w');
			fwrite($fp,'');
			fclose($fp);
			redirect('sys_config/update/'.$name);
		}else{
			
		}
	}
}