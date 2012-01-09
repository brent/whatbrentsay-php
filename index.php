<?php				
	
	// where areticles sit
	$base_dir = "articles";
	
	// array of all articles in the base_dir
	$articles = scandir($base_dir);
	
	foreach($articles as $article) {
		
		// only operate on folders that have metadata.json files 
		if(file_exists("{$base_dir}/{$article}/metadata.json")) {
		
			$file = file_get_contents("{$base_dir}/{$article}/metadata.json");
			$article_data = json_decode($file);
			
			// grab all the object variables then put them in an array
			$article_data = get_object_vars($article_data);
			
			// add article root path to article data array
			$article_data["base_path"] = $base_dir."/".$article."/";
			
			// yay, multidimensional arrays
			$articles_array[] = $article_data;
			
		}
	}
	
	// reverse sort the array by each article's id
	arsort($articles_array);
	
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
			
			<?php foreach($articles_array as $single_article): ?>
					
				<div class="article">
				
					<div class="metadata">
						<h2 class="title">
							<a href="<?php echo $single_article['base_path']; ?>">
								<?php echo $single_article['title']; ?>
							</a>
						</h2>
						
						<h3 class="date">
							<?php echo $single_article['date']; ?>
						</h3>
						
					</div><!-- END .metadata -->
					
					<a href="<?php echo $single_article['base_path']; ?>">
						<img class="thumb" src="<?php echo $single_article['base_path'].$single_article['thumbnail']; ?>" />
					</a>
									
				</div><!-- END .article -->
										
			<?php endforeach; ?>
			
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
	</body>
</html>