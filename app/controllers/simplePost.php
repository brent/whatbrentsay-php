<?php
	
	require_once(MODELS.DS.$contentType.".class.php");
	
	$data['settings'] = $settings;
	
	$data = simplePost::get_content($contentName);
	
	echo $twig->render("simplePost.html", $data);