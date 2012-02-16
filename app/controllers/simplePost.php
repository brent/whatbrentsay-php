<?php
	
	require_once(MODELS.DS.$contentType.".class.php");
	
	$data['settings'] = $settings;
	
	$contents = simplePost::get_content($contentName);
	
	$data['fileContents'] = $contents['fileContents'];
	$data['metadata'] = $contents['metadata'];
	
	echo $twig->render("simplePost.html", $data);