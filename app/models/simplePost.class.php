<?php

require_once("post.class.php");

class simplePost extends Post {
	
	public static function get_all() {
	
		global $settings;
		
		$simplePostsDir 	= $settings['simplePost'];
		$metadata			= $settings['metadata'];
		
		$data = self::dir_scan($simplePostsDir, $metadata);
		
		rsort($data);
		return $data;
	
	}
	
	public static function get_content($contentName) {
		
		global $settings;
		
		$dir = PUB.DS.$settings['simplePost']."/".$contentName;
		
		$dirContents = scandir(PUB.DS.$settings['simplePost']."/".$contentName);
		
		foreach($dirContents as $file) {
						
			if(preg_match("/.*.txt/", $file, $match) || preg_match("/.*.md/", $file, $match)) {
			
				$fileContents = file_get_contents($dir."/".$match[0]);
				$data['fileContents'] = $fileContents;
							
			}
			
			if(preg_match("/.*.json/", $file, $match)) {
				
				$jsonFile = file_get_contents($dir."/".$match[0]);
				$json = json_decode($jsonFile);
				$data['metadata'] = $json;				
			}
	
		}
		
		return $data;
	}
		
}