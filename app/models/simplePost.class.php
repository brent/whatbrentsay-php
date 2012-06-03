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
		
		$dir = PUB.DS.$settings['simplePost'].'/'.$contentName;
		
		$dirContents = scandir(PUB.DS.$settings['simplePost']."/".$contentName);
		
		foreach($dirContents as $file) {

			if(file_exists($dir.'/'.$settings['metadata'])) {
				
				$jsonFile = file_get_contents($dir.'/'.$settings['metadata']);
				$json = json_decode($jsonFile);
				$data['metadata'] = $json;
						
				if(preg_match("/.*.txt/", $file, $match) || preg_match("/.*.md/", $file, $match)) {
					
					require_once(LIB.DS.'PHP_Markdown/markdown.php');
					
					$fileContents = file_get_contents($dir."/".$file);
					$data['fileContents'] = Markdown($fileContents);
					
				} else {
					$data['fileContents'] = 'could not load file';
				}
				
			} else {
				$data['metadata'] = 'metadata not present';
			}
			
		}
		
		return $data;
	}

}