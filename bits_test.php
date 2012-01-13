<?php
	
	require_once('includes/functions.php');
	
	$bits_dir = "bits";
	
	$bits_array = get_content_no_metadata($bits_dir);
	
	foreach($bits_array as $bit) {
		echo "Bit {$bit['folder_name']}: {$bit['title']}";
		echo "<br />";
	}

?>