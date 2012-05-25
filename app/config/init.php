<?php
	
	require_once('settings.php');
	
	# Directory separator for Win/Unix
	defined('DS') 			? 	null : define('DS', DIRECTORY_SEPARATOR);
	
	# Top level site root
	$cwd = dirname(dirname(dirname(__FILE__)));
	defined('SITE_ROOT') 	? 	null : define('SITE_ROOT', $cwd);
	
	# App directories
	defined('APP') 			? 	null : define('APP', SITE_ROOT.DS.'app');
	defined('CONFIG') 		? 	null : define('CONFIG', APP.DS.'config');
	defined('LIB') 			? 	null : define('LIB', APP.DS.'lib');
	defined('CONTROLLERS') 	? 	null : define('CONTROLLERS', APP.DS.'controllers');
	defined('MODELS') 		? 	null : define('MODELS', APP.DS.'models');
	defined('VIEWS') 		? 	null : define('VIEWS', APP.DS.'views');
	
	# Public directories
	defined('PUB') 			? 	null : define('PUB', SITE_ROOT.DS.'public');
	defined('HTMLPOST') 	? 	null: define('HTMLPOST', PUB.DS.$settings['HTMLPost']);
	defined('SIMPLEPOST') 	? 	null: define('simplePost', PUB.DS.$settings['simplePost']);
	
	# Necessary classes
	require_once(MODELS.DS.'post.class.php');
	
	# Twig
	require_once(LIB.DS.'Twig'.DS.'Autoloader.php');
	Twig_Autoloader::register();
	
	$loader = new Twig_Loader_Filesystem(array(VIEWS, HTMLPOST));
	$twig = new Twig_Environment($loader);