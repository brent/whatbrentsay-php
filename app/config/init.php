<?php
    // App Settings ---------------------------------------------

    // The blog title.
    $title = "";

    // The content filename.
    $filename = 'article';

    # Preferred file format.
    $format = 'md';
    # $format = 'html';

    # Template Folder
    $template = "";


    // Directory Constants --------------------------------------

    # Articles subdirectory
    $base_dir = 'articles';

    # Template folder
    $template = ($template != "") ? $template . "/" : "";

    # Current file path
    $cwd = dirname(dirname(__FILE__));

    # Directory separator (Windows/Linux agnostic)
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    # Application directories
    defined('APP') ? null : define('APP', $cwd.DS);
    defined('LIB') ? null : define('LIB', APP.'lib'.DS);


    // Libraries ------------------------------------------------

    # Markdown
    require_once(LIB.'markdown'.DS.'markdown-extra.php');

    # Twig
    require_once(LIB.DS.'Twig'.DS.'Autoloader.php');

	Twig_Autoloader::register();
	
	try {
    	$loader = new Twig_Loader_Filesystem(APP.'templates'.DS.$template);
    	$twig = new Twig_Environment($loader);
    } catch (Exception $e) {
        $message = $e->getMessage();
        $message = str_replace("\"/", "directory <span style='background: #efefef; padding: 3px; font-family: monospace'>/", $message);
        $message = str_replace("\" directory", "</span>", $message);
    
        echo "<div style='margin: 60px auto; width: 500px'>";
        echo "<h1 style='font-family: sans-serif; font-weight: 300; text-align: center;'>There was a problem with Twig.</h1>";
        echo "<p style='font: 16px/1.5 sans-serif; font-weight: 300;'>" . $message . "";
        echo "<p style='font: 16px/1.5 sans-serif; font-weight: 300;'>You are seeing this because that is set as your template directory in the app configuration.";
        echo "</div>";

        exit;
    }
?>
