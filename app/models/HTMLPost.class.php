<?php

require_once("post.class.php");

class HTMLPost extends Post {
	
	public static function list_all() {
		
		global $settings;
		$HTMLPostsDir 	= $settings['HTMLPosts'];
		$metadata		= $settings['metadata'];
		
		$allHTMLPosts = scandir($HTMLPostsDir);
		
		foreach($allHTMLPosts as $singleFolder) {

			if(file_exists($HTMLPostsDir."/".$singleFolder."/".$metadata)) {
							
				$jsonFile = file_get_contents($HTMLPostsDir."/".$singleFolder."/".$metadata);
				$json = json_decode($jsonFile);
				$json->dir = $HTMLPostsDir."/".$singleFolder;
				
				// Sets each json object's array key equal to
				// the post's id (allows for sorting)
				$data[$json->id] = $json;
			}
			
		}
		rsort($data);
		return $data;	
	}
	
}