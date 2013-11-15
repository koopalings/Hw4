<?php
    /**
     * index.php will determine whether a web service
     * has been invoked or the landing page has been requested.
     * It then hands this off to the appropriate controller
     */

    require_once('config/config.php');
    require_once(CONTROLLERS . '/main.php');
    require_once(CONTROLLERS . '/rest.php');

    session_start();

    $uri = $_SERVER["REQUEST_URI"];

    $str = array_pop(split("/", $uri));

    if ($str == "" || $str == "index.php") {
        echo  "go to main";
    } else {
        $restController = new RestController($uri);
    }
?>