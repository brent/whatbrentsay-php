<?php

	require_once("app/config/init.php");
		
	$data = $json->read(CONFIG.DS."settings.json");
	echo $twig->render("home.php", $data);