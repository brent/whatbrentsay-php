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
		
}