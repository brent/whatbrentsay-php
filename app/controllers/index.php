<?php

	require_once(MODELS.DS."HTMLPost.class.php");
	//$data = $json->read(CONFIG.DS."settings.json");
	
	$data[] = $settings;
	$data['articles'] = HTMLPost::list_all();
		
	echo $twig->render("index.php", $data);
	
	