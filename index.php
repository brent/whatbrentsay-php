<?php
	
	# App wide settings
	$settings = array(
		
		// Site title
		"siteTitle" 		=> "What Brent Say",
		
		// HTMLPosts path (from web root)
		"HTMLPosts"			=> "public/articles",
		
		// HTMLPost metadata name
		"metadata"			=> "metadata.json",
		
		// Amount of articles displayed per page
		"PostsPerPage" 		=> "5"
	
	);
	
	require_once("app/config/init.php");
	
	# Get URL params
	
	require_once("app/controllers/index.php");