<?php
	
	require_once("includes/functions.php");
	
	// where articles sit
	$article_dir = "articles";
	
	// where bits live
	$bits_dir = "bits";
	
	
	$articles_array = get_content_with_metadata($article_dir);
	$bits_array = get_content_no_metadata($bits_dir);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>What Brent Say</title>
		<link type="text/css" rel="stylesheet" href="css/reset.css" />
		<link type="text/css" rel="stylesheet" href="css/main.css" />
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	</head>
	<body>
	
		<div id="wrapper">
		
			<div class="left">
			
				<h1 class="logo">What Brent Say</h1>
				
				<div class="hello_copy">
					
					<p>I'm Brent Meyer, a geek, technophile, web designer, and developer. This is where I write. It's experimental, raw, and evolving right now, but stick around if you enjoy what you see.</p>
					
					<p>You should <a class="twitter" href="http://twitter.com/brentmeyer">follow me on twitter</a> if you like what I say. Feel free to keep up with <a class="dribbble" href="http://dribbble.com/brentmeyer">what I'm working on dribbble</a>, too. You can take a look at <a class="portfolio" href="http://brentmeyer.is">some of my work</a> or <a class="email" href="mailto:brent@brentemeyer.com">email me</a> if you just want to say hi.</p>
					
				</div><!-- END .hello_copy -->
								
			</div><!-- END .left -->
			
			<div class="right main">
			
			<?php $count = 0; foreach($articles_array as $single_article): ?>
				
				<?php if($count > 0 && $count % 2 !== 0): ?>
				<div class="row">
				<?php endif; ?>
				
				<a class="article <?php if($count > 0): ?>small<?php endif; ?> <?php if($count % 2 !== 0): ?>left<?php else: ?>right<?php endif; ?>" href="<?php echo $single_article['base_path']; ?>">
					
					<div class="metadata">
						<h2 class="title"><?php echo $single_article['title']; ?><span class="date"> on <?php echo $single_article['date']; ?></span></h2>
					</div>
					
					<img class="thumb" src="<?php echo $single_article['base_path'].$single_article['thumbnail']; ?>" />
									
				</a><!-- END .article -->
				
				<?php if($count > 0 && $count % 2 === 0): ?>
				</div>
				<?php endif; ?>
				
				<?php if($count==0): ?>
				
					<div class="bits_container">
					
						<a href="<?php echo "{$bits_dir}/{$bits_array[0]['folder_name']}/{$bits_array[0]['title']}"; ?>">Bit <?php echo $bits_array[0]['folder_name']; ?>: <?php echo $bits_array[0]['clean_title']; ?></a>
					
					</div><!-- END .bits_container -->
				
				<?php endif; ?>
				
			<?php $count++; endforeach; ?>
			
			</div><!-- END .right.main -->
		
		</div id="wrapper">
			
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
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
									
					$(".article").hover(function(){
					
						var metaHeight = $(this).children(".metadata").outerHeight();
					
						$(this).children(".thumb").animate({
							bottom: metaHeight
						}, 200);
					
					}, function() {
					
						$(this).children(".thumb").animate({
							bottom: 0
						}, 200);
					
					});
				});
			</script>

	</body>
</html>