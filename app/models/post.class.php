<?php

class Post {
			
	public static function list_all() {
		
		$allPosts = array_merge(self::get_all('HTMLPost'), simplePost::get_all('simplePost'));		
		
		foreach($allPosts as $post) {
			$post->unixdate = strtotime($post->date);
		}
		
		usort($allPosts, array("Post", "sort_by_date"));
		
		return $allPosts;
		
	}
	
	public static function get_all($postType) {
		
		global $settings;
		
		if($postType == 'HTMLPost') {
			$postDir = $settings['HTMLPost'];
		} elseif($postType == 'simplePost') {
			$postDir = $settings['simplePost'];
		}
		
		$metadata = $settings['metadata'];
		
		$data = self::dir_scan($postDir, $metadata);
		
		rsort($data);
		return $data;
	
	}
	
	public static function sort_by_date($a, $b) {
        if ($a->unixdate > $b->unixdate) return -1;
        else if($a->unixdate == $b->unixdate) return 0;
        else return 1;
    }
	
	public static function dir_scan($dir, $metadata) {
		
		// grab all the folders in the specified directory
		//$allPosts = scandir("public/{$dir}");
		$allPosts = scandir(PUB.DS.$dir);
		
		// loop through each folder and...
		foreach($allPosts as $singleFolder) {
			
			// check for metadata.json
			if(file_exists(PUB.DS.$dir.DS.$singleFolder.DS.$metadata)) {
							
				$jsonFile = file_get_contents(PUB.DS.$dir.DS.$singleFolder.DS.$metadata);
				$json = json_decode($jsonFile);
				$json->dir = $dir.DS.$singleFolder;
				
				if(isset($json->thumbnail)) {
					$json->thumbnail = "public".DS.$json->dir.DS.$json->thumbnail;
				}
				
				if(isset($json->thumbnail_small)) {
					$json->thumbnail_small = "public".DS.$json->dir.DS.$json->thumbnail_small;
				}
				
				// Sets each json object's array key equal to
				// the post's id (allows for sorting)
				$data[$json->id] = $json;
			}
			
		}
		
		return $data;
			
	}
	
}