<?php

	require_once(MODELS.DS."HTMLPost.class.php");
	require_once(MODELS.DS."simplePost.class.php");
	
	$data['settings'] = $settings;
	
	# ALL POSTS
	# $allPosts		= Post::list_all();
	
	# All HTMLPosts
	$HTMLPosts 		= Post::get_all('HTMLPost');
	
	# All simplePosts
	$simplePosts	= Post::get_all('simplePost');
	
	# Most Recent HTMLPost
	$mostRecentHTMLPost 	= array_shift($HTMLPosts);
	
	# Most Recent simplePost
	$mostRecentSimplePost	= array_shift($simplePosts);
	
	
	# Add whatever data you want to use to the data array
	# $data['allPosts']				= $allPosts;
	$data['mostRecentHTMLPost']		= $mostRecentHTMLPost;
	$data['HTMLPosts']				= $HTMLPosts;
	$data['mostRecentSimplePost']	= $mostRecentSimplePost;
	$data['simplePosts']			= $simplePosts;
		
	# Send data to the view
	echo $twig->render("index.html", $data);