<?php
	
	# App wide settings
	$settings = array(
		
		# Site title
		"siteTitle" 		=> "What Brent Say",
		
		# HTMLPosts folder (adjust for your folder name)
		"HTMLPosts"			=> "HTMLPosts",
		
		# simplePosts folder (adjust for your folder name)
		"simplePosts"		=>	"simplePosts",
		
		# HTMLPost metadata name
		"metadata"			=> "metadata.json",
		
		# Amount of articles displayed per page
		"PostsPerPage" 		=> "5"
	
	);
	
	require_once("app/config/init.php");
	
	/*

	print_r($_GET);
	
	echo "<br /><hr />";
	
	if(empty($_GET['rt'])) {
		echo "No params; index.php";
	} else {
	
		$parts = explode("/", $_GET['rt']);
		
		echo "controller: ".array_shift($parts);
		echo "<br />";
		echo "parameter: ".array_shift($parts);
		echo "<br />";
		if(!empty($parts)) {
			echo "more vars: ";
			foreach($parts as $part) {
				echo $part;
				echo ", ";
			}
		}
	}
	
	*/
		
	require_once("app/controllers/index.php");