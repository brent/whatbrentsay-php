<?php
	
	require_once(MODELS.DS.$contentType.".class.php");
	require_once(LIB.DS.'smartypants'.DS.'smartypants.php');
	require_once(LIB.DS.'PHP_markdown_extra'.DS.'markdown.php');
	
	$data['settings'] = $settings;
	
	$data = simplePost::get_content($contentName);
	
	$data['fileContents'] = SmartyPants(Markdown($data['fileContents']));
	
	echo $twig->render("simplePost.html", $data);
