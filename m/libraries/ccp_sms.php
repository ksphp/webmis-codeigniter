<?php
/*
 * 短信接口—容联云通讯
 * send('手机号码', '短信内容');
 * send('手机号码',array('校证码','参数2'),'短信模板')
 */
class Ccp_sms{
	var $AccountSid= '';		// ACCOUNT SID
	var $AccountToken= '';	// AUTH TOKEN
	var $AppId='';			// APP ID
	var $ServerIP='app.cloopen.com';					// 生产环境
	//var $ServerIP='sandboxapp.cloopen.com';				// 沙盒环境
	var $ServerPort='8883';							// 请求端口
	var $SoftVersion='2013-12-26';						//REST版本号
	var $BodyType = "json";														//格式，可填值：json 、xml
	var $Batch;
	
	//发送验证码
	function send($mobile='',$message='',$tempId='1'){
		if($mobile && $message) {
			$this->Batch = date("YmdHis");
			//请求地址
			$sig =  strtoupper(md5($this->AccountSid . $this->AccountToken . $this->Batch));
			$url="https://$this->ServerIP:$this->ServerPort/$this->SoftVersion/Accounts/$this->AccountSid/SMS/TemplateSMS?sig=$sig";
			//请求内容
			$data="";
			if($this->BodyType=="json"){
				foreach ($message as $val){
					$data = $data. "'".$val."',";
				}
				$body= "{'to':'$mobile','templateId':'$tempId','appId':'$this->AppId','datas':[".$data."]}";
			}else {
				foreach ($message as $val){
					$data = $data. "<data>".$val."</data>";
				}
				$body="<TemplateSMS><to>$mobile</to><appId>$this->AppId</appId><templateId>$tempId</templateId><datas>".$data."</datas></TemplateSMS>";
			}
			//请求头
			$authen = base64_encode($this->AccountSid . ":" . $this->Batch);
			$header = array("Accept:application/$this->BodyType","Content-Type:application/$this->BodyType;charset=utf-8","Authorization:$authen");
			// 发送请求
			$result = json_decode($this->curl_post($url,$body,$header));
			return $result->statusCode=='000000'?TRUE:FALSE;
		}else {return false;}
	}
	//HTTPS请求
	private function curl_post($url,$data,$header,$post=1){
		$ch = curl_init();
		$res= curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, $post);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
		$result = curl_exec ($ch);
		return $result;
	}
}