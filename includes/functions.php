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
	arsort($content_array);
	
	return($content_array);
}

function get_content_no_metadata($content_dir) {
	
	$all_content = scandir($content_dir);
	
	foreach($all_content as $content) {
	
		$content_data['folder_name'] = $content;
			
		$single_dir = opendir("{$content_dir}/{$content}");
	
		while(($file = readdir($single_dir)) !== false) {
			if(preg_match("/.+txt/", $file, $matches)) {
				$content_data['title'] = $matches[0];
			} else {
				$content_data['title'] = null;
			}
		}
		if(isset($content_data['title'])) {
			$content_array[] = $content_data;
		}
	
	}
	
	arsort($content_array);
	
	return($content_array);
	
}