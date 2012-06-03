<?php
	
	require_once(MODELS.DS.$contentType.".class.php");
	
	$data['settings'] = $settings;
	
	$data = simplePost::get_content($contentName);
	
	var_dump($data);
	
	//echo $twig->render("simplePost.html", $data);