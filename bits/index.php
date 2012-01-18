<?php
	
	require_once("../includes/functions.php");
	
	if(empty($_GET)) {
		header("Location: ../");
		exit;
	} else {
		
		$folder = $_GET['folder'];
		$bit_title = $_GET['bit'];
		$bit = $bit_title.".txt";
		
		$bit_content = file_get_contents("{$folder}/{$bit}");
		
		if($bit_content == false) {
			header("Location: ../");
			exit;
		}
	
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "Bit {$folder}: {$bit}"; ?></title>
		<link type="text/css" rel="stylesheet" href="../../css/reset.css" />
		<link type="text/css" rel="stylesheet" href="../../css/bit.css" />
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div class="wrapper">
			
			<h2 class="bit_title"><?php $bit_title = cleanup_title($bit_title); echo "Bit {$folder}: {$bit_title}"; ?></h2>
						
			<p class="bit_content"><?php echo nl2br($bit_content); ?></p>

		</div><!-- END .wrapper -->
		
	</body>
</html>