<?php
	
	# App wide settings
	$settings = array(
		
		// Site title
		"siteTitle" 		=> "What Brent Say",
		
		// HTMLPosts folder
		"HTMLPosts"			=> "articles",
		
		// simplePosts folder
		"simplePosts"		=>	"bits",
		
		// HTMLPost metadata name
		"metadata"			=> "metadata.json",
		
		// Amount of articles displayed per page
		"PostsPerPage" 		=> "5"
	
	);
	
	//echo strtotime("Jan 3, 2012");
	
	require_once("app/config/init.php");
		
	require_once("app/controllers/index.php");