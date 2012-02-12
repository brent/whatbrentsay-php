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
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-15909605-2']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	
</html>