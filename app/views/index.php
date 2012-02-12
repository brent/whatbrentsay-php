<!DOCTYPE html>
<html>
	<head>
		<title>{{ siteTitle }}</title>
		<link rel="stylesheet" type="text/css" href="public/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="public/css/main.css" />
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	</head>
	<body>
	
		<div id="wrapper">
			
			<div class="left">
			
				<h1 class="logo">{{ siteTitle }}</h1>
				
				<div class="hello_copy">
					
					<p>I'm Brent Meyer, a geek, technophile, web designer, and developer. This is where I write. It's experimental, raw, and evolving right now, but stick around if you enjoy what you see.</p>
					
					<p>You should <a class="twitter" href="http://twitter.com/brentmeyer">follow me on twitter</a> if you like what I say. Feel free to keep up with <a class="dribbble" href="http://dribbble.com/brentmeyer">what I'm working on dribbble</a>, too. You can take a look at <a class="portfolio" href="http://brentmeyer.is">some of my work</a> or <a class="email" href="mailto:brent@brentemeyer.com">email me</a> if you just want to say hi.</p>
					
				</div><!-- END .hello_copy -->
								
			</div><!-- END .left -->
			
			<div class="right main">
				
				<div class="row">
				
					<a class="article" href="{{ mostRecentArticle.dir }}">
					
						<div class="metadata">
							<h2 class="title">{{ mostRecentArticle.title }} <span class="date">{{ mostRecentArticle.date }}</span></h2>
						</div><!-- END .metadata -->
						
						<img class="thumb" src="{{ mostRecentArticle.dir }}/{{ mostRecentArticle.thumbnail }}" />
						
					</a><!-- END .article -->
					
				</div><!-- END .row -->
				
				<div class="bits_container">
					<a href="{{ bit.dir }}">Bit {{bit.id }}: {{ bit.title }}</a>
				</div><!-- END .bits_container -->
				
				<div class="row">
				{% for article in articles %}
				
					<a class="article small {{ cycle(['right', 'left'], loop.index) }}" href="{{ article.dir }}">
					
						<div class="metadata">
							<h2 class="title">{{ article.title }} <span class="date">{{ article.date }}</span></h2>
						</div><!-- END .metadata -->
						
						<img class="thumb" src="{{ article.dir }}/{{ article.thumbnail }}" />
						
					</a><!-- END .article -->
				
				{% if loop.index is divisibleby(2) %}	
				</div><!-- END .row -->
				<div class="row">
				{% endif %}
				{% endfor %}
				
			</div><!-- END .right.main -->
			
		</div><!-- END #wrapper -->
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="public/js/site.js"></script>
		
	</body>
</html>