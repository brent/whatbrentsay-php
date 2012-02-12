<?php

	require_once(MODELS.DS."HTMLPost.class.php");
	require_once(MODELS.DS."simplePost.class.php");
	//$data = $json->read(CONFIG.DS."settings.json");
	
	$data[] = $settings;
	
	$HTMLPosts 		= HTMLPost::get_all();
	$simplePosts	= simplePost::get_all();
	
	$mostRecentArticle 	= array_shift($HTMLPosts);
	$mostRecentBit		= array_shift($simplePosts);
	
	$data['mostRecentArticle']	= $mostRecentArticle;
	$data['articles']			= $HTMLPosts;
	$data['bit']				= $mostRecentBit;
		
	echo $twig->render("index.php", $data);
	
	//print_r($data);