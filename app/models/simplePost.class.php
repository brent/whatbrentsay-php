<?php

class simplePost extends Post {
	
	public static function get_content($contentName) {

		/**
		  * Imports $settings and grabs the specified simplePost.
		  * Checks for .txt or .md extensions, otherwise it'll return null.
		  * Also checks for your metadata.json file.
	 	  *
		  * NOTE: If you don't include the json file, the post will NOT
		  *	be displayed.
		  *
		  *
		  */
		 
		global $settings;
		
		$dir = PUB.DS.$settings['simplePost'].DS.$contentName;
		
		$dirContents = scandir($dir);
		$dirContents = array_slice($dirContents, 2);
		
		foreach($dirContents as $file) {
		
			if(preg_match('/.json$/', $file)) {
			
				$jsonFile = file_get_contents($dir.DS.$settings['metadata']);
				$json = json_decode($jsonFile);
				$data['metadata'] = $json;
				
			} else if(preg_match("/.txt$/", $file) || preg_match("/.md$/", $file)) {
								
				$fileContents = file_get_contents($dir.DS.$file);
				$data['fileContents'] = $fileContents;
				
			}
			
		}
		
		return $data;
	}
	
}