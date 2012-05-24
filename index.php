<?php
	
	require_once("app/config/init.php");
	
	$URI = $_SERVER['QUERY_STRING'];
	
	$URIParts = explode("/", $URI);
	
	if(!empty($URIParts[1])) {
				
		$contentType = array_search($URIParts[1], $settings);
		
		if(empty($URIParts[2])) {
			$contentName = null;
		} else {
			$contentName = $URIParts[2];
		}
		
		require_once(CONTROLLERS.DS.$contentType.".php");
		
	} else {
		require_once("app/controllers/index.php");
	}			
		
			