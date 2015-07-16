<?php
/*
 * QQ登陆接口
 */
class Qq{
	private $APP_ID = '101212808';
	private $APP_KEY = 'ed4f7ce7a2daccd34ed3a46a2aa3bf47';
	private $redirect_uri = 'http://www.ksphp.com/login/call_back.html';
	
	function Login(){
		$state = md5(uniqid(rand(), TRUE));
		$redirect_uri = urlencode($this->redirect_uri);
		$location = 'https://graph.qq.com/oauth2.0/authorize?response_type=code&scope=get_info&client_id='.$this->APP_ID.'&redirect_uri='.$redirect_uri.'&state='.$state;
		header("Location:".$location);
	}
	//回调方法
	function call_back(){
		$access_token = $this->getAccessToken($_GET['code']);
		$response = $this->getOpenId($access_token);
		if(strpos($response, "callback") !== FALSE){
			$lpos = strpos($response, "(");
			$rpos = strrpos($response, ")");
			$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
			$msg = json_decode($response);
			if(isset($msg->error)){
				echo '登陆失败！';
			}else{
				$UserInfo = $this->getUserInfo($access_token, $msg->openid);
				$user = json_decode($UserInfo);
				return $user;
			}
		}
	}
	private function getAccessToken($code){
		$grant_type = 'authorization_code';
		$client_id = $this->APP_ID;
		$client_secret = $this->APP_KEY;
		$redirect_uri = urlencode($this->redirect_uri);
		$ACCESS_TOKEN = file_get_contents('https://graph.qq.com/oauth2.0/token?grant_type='.$grant_type.'&client_id='
			.$client_id.'&client_secret='.$client_secret.'&code='.$code.'&redirect_uri='.$redirect_uri);
		return $ACCESS_TOKEN;
	}
	private function getOpenId($ACCESS_TOKEN){
		$uri = 'https://graph.qq.com/oauth2.0/me';
		$res = file_get_contents($uri.'?'.$ACCESS_TOKEN);
		return $res;
	}
	private function getUserInfo($ACCESS_TOKEN,$OpenId){
		$url = 'https://graph.qq.com/user/get_info?'.$ACCESS_TOKEN.'&scope=get_info&oauth_consumer_key='.$this->APP_ID.'&openid='.$OpenId;
		return file_get_contents($url);
	}
}