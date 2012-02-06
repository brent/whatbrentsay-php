<?php

class JSONHandler {
	
	public function read($jsonFile) {
		
		$file = file_get_contents($jsonFile);
		$json = json_decode($file);
		
		$jsonArray = get_object_vars($json);
		
		return($jsonArray);
		
	}

}