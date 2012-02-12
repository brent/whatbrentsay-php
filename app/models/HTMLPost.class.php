<?php

require_once("post.class.php");

class HTMLPost extends Post {
	
	public static function get_all() {
	
		global $settings;
		
		$HTMLPostsDir 	= "public/".$settings['HTMLPosts'];
		$metadata		= $settings['metadata'];
		
		$data = self::dir_scan($HTMLPostsDir, $metadata);
		
		rsort($data);
		return $data;
	
	}
	
}