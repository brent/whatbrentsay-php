<?php
		
	//$data = $json->read(CONFIG.DS."settings.json");
	
	$data = $settings;
	// $data.= Post::list_all();
	
	echo $twig->render("index.php", $data);
	
	