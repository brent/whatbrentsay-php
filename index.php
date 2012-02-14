<?php
	
	# App wide settings
	$settings = array(
		
		# Site title
		"siteTitle" 		=> "What Brent Say",
		
		# HTMLPost folder (adjust for your folder name)
		"HTMLPost"			=> "articles",
		
		# simplePost folder (adjust for your folder name)
		"simplePost"		=>	"bits",
		
		# HTMLPost metadata name
		"metadata"			=> "metadata.json",
		
		# Amount of articles displayed per page
		"PostsPerPage" 		=> "5"
	
	);
	
	require_once("app/config/init.php");
		
	$URIParts = explode("/", $_SERVER['QUERY_STRING']);
	
	$contentType 	= array_search($URIParts[1], $settings);
	
	if(empty($URIParts[2])) {
		$contentName = null;
	} else {
		$contentName = $URIParts[2];
	}
	
	require_once(CONTROLLERS.DS.$contentType.".php");
		
	
	// require_once("app/controllers/index.php");