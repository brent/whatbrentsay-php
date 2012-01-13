<?php
	require('app/config/init.php');

	// If the user has set a template, render the index.

	if ($template) {
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

      if (is_dir(APP.$template)) {
        $template = $twig->loadTemplate('index.html');
        echo $template->render($vars);
      } else {
        echo "<div style='margin: 60px auto; width: 500px'>";
        echo "<h1 style='font-family: sans-serif; font-weight: 300;'>Your template directory is empty.</h1>";
        echo "<p style='font: 16px/1.5 sans-serif; font-weight: 300;'>You need to have at least an <span style='background: #efefef; padding: 3px; font-family: monospace'>index.html</span> file in your template directory.";
        echo "</div>";
      }
  } else {
        echo "<div style='margin: 60px auto; width: 500px'>";
        echo "<h1 style='font-family: sans-serif; font-weight: 300;'>You need to configure your app.</h1>";
        echo "<p style='font: 16px/1.5 sans-serif; font-weight: 300;'>Go to the <span style='background: #efefef; padding: 3px; font-family: monospace'>app/</span> directory and set your template path and site title.</p>";
        echo "</div>";
    }
?>
