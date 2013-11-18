<?php

require_once(MODELS . '/ads.php');
require_once(VIEWS . '/xml.php');

/**
 *  This controller is responsible for validating and processing the request
 *  and returning the results
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
    var $methods;

    /**
     * Allowed parameters
     */
    var $params;

    function __construct($uri) {
        $this->uri = $uri;
        $this->methods = Ad::$methods;
        $this->params = Ad::$params;
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
                $this->validateParam($methodPos);
            else  //  return error
                $this->displayError(404);
        } else
            $this->displayError(404);
    }

    /**
     *  validate the args and vals for each method
     */
    function validateParam($index) {
        $param = $this->params[$index]; // expected parameter for method
        if (isset($_REQUEST[$param]) && $_REQUEST[$param] != "") {
            $ads = new Ad($this->methods[$index], $_REQUEST[$param]);

            if (!$ads->getResults()) {
                $this->displayError(400);
            } else if ($this->methods[$index] == 'get-ad')
                $this->returnFormat($_REQUEST[$param], $ads->getResults());
        }
        else
            $this->displayError(400);
    }

    /**
     *
     */
    function returnFormat($format, $results) {
        if ($format == "json") {
            header('Content-type: application/json');
            echo json_encode(array("Ad"=>$results));
        } else if ($format == "xml") {
            header('Content-type: text/xml');
            XMLView::draw($results);
        } else
            $this->displayError(400);
    }

    /**
     *  Set response code and response for requests that cannot be handled.
     */
    function displayError($status) {
        http_response_code($status);
        switch($status) {
            case 400:
                echo "Invalid arguments for method.";
                break;
            case 404:
            default: 
                echo "Method was not found.";
        }
    }
}
?>