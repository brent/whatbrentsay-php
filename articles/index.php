<?php
    // Tests if we are in a subdirectory.
    // If there are more than 3 parts, there are 2 subdirectories (the installed dir and the articles dir)
    // Thus, we can through the installed dir in a variable.
    
    // This can be more robust by counting how many parts there are (minus the empty ones) and subtracting one from the end.
    // Then we can just concatenate the remaining ones and that is where we want to redirect to, regardless of filesystem level.
    $dir = "";
    if (count($parts = explode('/', $_SERVER['REQUEST_URI'])) > 3) {
        $dir = '/'.$parts[1];
    }

    // Creates a URL to redirect to.
    $url = "http://" . $_SERVER['SERVER_NAME'] . $dir;

    header("Location: " . $url); 
    exit;
?>