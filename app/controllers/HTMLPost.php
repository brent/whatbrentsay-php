<?php
	
		
	$data['HTMLPost'] = "/".$contentName."/"."index.html";
	
	# These determine the paths for media called within
	# an individual HTMLPost. You'll only need to change this
	# if you decide to change the names of folders in
	# the file structure, which you probably won't do anyway.
	$data['global'] 	= "../public";
	$data['local'] 	= "../public/{$settings['HTMLPost']}/{$contentName}";
		
	echo $twig->render("HTMLPost.html", $data);