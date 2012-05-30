<?php
	
	# I hate how silly this looks...
	$web_root = dirname(dirname(dirname(dirname(__FILE__))));
	$path_to_init = $web_root.'/app/config/init.php';
	
	require_once($path_to_init);
	
	$data = Post::get_all('simplePost');
	sort($data);
		
	echo json_encode($data);