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
	$loader = new Twig_Loader_Filesystem(APP.'templates'.DS.$template);
	$twig = new Twig_Environment($loader);
?>
