<?php
/*
 * 所在城市—新浪
 */
class Get_city{
	function GetCity($IP=''){
		if(empty($IP)){
			return FALSE;
		}else{
			$url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$IP;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_ENCODING, 'utf8');
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$location = curl_exec($ch);
			$location = json_decode($location);
			curl_close($ch);
			//返回城市
			if ($location === FALSE){
				return FALSE;
			}else{
				return $location->city;
			}
		}
	}
}