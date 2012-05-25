<?php
	
	require_once('app/config/init.php');
	
	$URI = $_SERVER['QUERY_STRING'];
	
	$URIParts = explode('/', $URI);
	
	if(isset($URIParts[1])) {
				
		$contentType = array_search($URIParts[1], $settings);
		
		if(!isset($URIParts[2])) {
			$contentName = null;
		} else {
			$contentName = $URIParts[2];
		}
		
		if($contentType==null) {
			require_once('app/controllers/index.php');
		}
		
		require_once(CONTROLLERS.DS.$contentType.'.php');
		
	} else {
		require_once('app/controllers/index.php');
	}