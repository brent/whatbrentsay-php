<?php
	
	# I hate how silly this looks...
	$root = dirname(dirname(dirname(dirname(__FILE__))));
	$path_to_init = $root.'/app/config/init.php';
	
	require_once($path_to_init);
	
	$data = Post::get_all('simplePost');
	
	if($_GET['direction']=='next') {
		$postId = $_GET['current_id'] + 1;
	} elseif($_GET['direction']=='prev') {
		$postId = $_GET['current_id'] - 1;
	} else {
		$postId = null;
	}
	
	foreach($data as $post) {
		if($post->id == $postId) {
			echo json_encode($post);
		}
	}