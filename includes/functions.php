<?php 

function get_content_with_metadata($content_dir) {
		
	$all_content = scandir($content_dir);
	
	foreach($all_content as $content) {
		
		// only operate on folders that have metadata.json files 
		if(file_exists("{$content_dir}/{$content}/metadata.json")) {
		
			$json = file_get_contents("{$content_dir}/{$content}/metadata.json");
			$content_data = json_decode($json);
			
			// grab all the object variables then put them in an array
			$content_data = get_object_vars($content_data);
			
			// add content root path to article data array
			$content_data["base_path"] = $content_dir."/".$content."/";
			
			// yay, multidimensional arrays
			$content_array[] = $content_data;
			
		} 
	}
	// reverse sort the array by content id
	rsort($content_array);
	return($content_array);
}

function get_content_no_metadata($content_dir) {
	
	$all_content = scandir($content_dir);
	
	foreach($all_content as $content) {
		
		if(is_dir("{$content_dir}/{$content}")) {

			// sets $content to the name of the folder
			$content_data['folder_name'] = $content;
			
			// open the directory the content is in
			$single_dir = opendir("{$content_dir}/{$content}");
		
			// read the files in the directory, then look for
			// files with a .txt (or .md) extension and add just
			// that file's name to the $content_data array
			while(($file = readdir($single_dir)) !== false) {
				
				$regex = "/(.+).txt/";
				
				if(preg_match($regex, $file, $matches)) {
					$content_data['title'] = $matches[1];
				} else {
					$content_data['title'] = null;
				}
			}
			
			// ensures you only return folders with .txt files
			if(isset($content_data['title'])) {
				$content_data['clean_title'] = cleanup_title($content_data['title']);
				$content_array[] = $content_data;
			}
			
		}
	
	}
	
	rsort($content_array);
	return($content_array);
	
}

function get_content_name($content_dir) {
	
	if(is_dir($content_dir)) {

		while(($file = readdir($content_dir)) !== false) {
			
			$regex = "/(.+).txt/";
			
			if(preg_match($regex, $file, $matches)) {
				$title = $matches[1];
			} else {
				$title = null;
			}
		}
		
	}
	
	return $title;
	
}

function cleanup_title($title) {
	
	$no_underscores = preg_replace("/_+/", " ", $title);
	$good_title = ucwords($no_underscores);
	return $good_title;
	
}