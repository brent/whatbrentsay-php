<?php

class Post {
			
	public static function list_all() {
		
		$allPosts = array_merge(HTMLPost::get_all(), simplePost::get_all());		
		//$allPosts = HTMLPost::get_all();
		
		foreach($allPosts as $post) {
			$post->unixdate = strtotime($post->date);
		}
		
		usort($allPosts, array("Post", "sort_by_date"));
		
		return $allPosts;
		
	}
	
	public static function get_all() {
	}
	
	public static function dir_scan($dir, $metadata) {
		
		// grab all the folders in the HTMLPosts dir
		$allPosts = scandir($dir);
		
		// loop through each folder in HTMLPosts dir
		foreach($allPosts as $singleFolder) {
			
			// check for metadata.jon
			if(file_exists($dir."/".$singleFolder."/".$metadata)) {
							
				$jsonFile = file_get_contents($dir."/".$singleFolder."/".$metadata);
				$json = json_decode($jsonFile);
				$json->dir = $dir."/".$singleFolder;
				
				// Sets each json object's array key equal to
				// the post's id (allows for sorting)
				$data[$json->id] = $json;
			}
			
		}
		
		return $data;
			
	}
	
	 public static function sort_by_date($a, $b) {
        if ($a->unixdate > $b->unixdate) return -1;
        else if($a->unixdate == $b->unixdate) return 0;
        else return 1;
    }
	
}