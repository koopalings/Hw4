<?php

/**
 *  This controller is responsible for validating and processing the request
 *  and returning the results
 *
 *
 *
 */

class RestController {
    var $uri = null;

    /**
     *  Method invoked
     */
    var $method = null;

    /**
     *  Allowed methods for web service
     */
    var $methods = array("get-ads", "increment-choice", "increment-vulnerable");

    function __construct($uri) {
        $this->uri = $uri;
        $this->init();
    }

    /**
     *  Parse for method and determine if valid.
     *  Function should hand this off for error handling or further processing.
     */
    function init() {
        $uri_arr = split('/', $this->uri);
        $pos = array_search('index.php', $uri_arr);
        if ($pos) {
            $method = $uri_arr[$pos + 1]; // get the path after index.php
            // index of method
            $methodPos = array_search($method, $this->methods); 
            if ($methodPos !== FALSE) //  if valid method
                echo $method . ' is valid.';
            else  //  return error
                $this->displayError(404);
        } else
            $this->displayError(404);
    }

    /**
     *  Set response code and response for requests that cannot be handled.
     */
    function displayError($status) {
        switch($status) {
            case 404:
            default: 
                http_response_code(404);
                echo "Method was not found.";
        }
    }
}
?>