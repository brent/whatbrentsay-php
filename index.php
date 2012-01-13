<?php				
	require('app/config/init.php');
	
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
	
	$vars['title'] = $title;
	$vars['articles'] = $articles_array;
	
	$template = $twig->loadTemplate('index.html');
    echo $template->render($vars);
?>
