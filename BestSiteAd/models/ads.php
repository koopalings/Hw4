<?php

require_once(MODELS . '/model.php');

/**
 *
 * Class to create, read, update, and delete ads from database.
 *
 */
class Ad extends Model {

    /**
     *  Allowed methods for web service
     */
    static $methods = 
        array("get-ads", "increment-choice", "increment-vulnerable");

    /**
     * Allowed parameters
     */
    static $params = array("format", "id", "id");

    var $method = null;
    var $param = null;
    var $results = null;

    function __construct($method, $param) {
        parent::__construct();
        $this->method = $method;
        $this->param = $param;
        $this->init();
    }

    /**
     * Depending on the method and parameter, delegate to correct function
     */
    function init() {
        switch ($this->method) {
            case "get-ads":
                $this->getAd();
                break;
            case "increment-choice":
                $this->increment();
                break;
            case "increment-vulnerable":
                $this->incrementVuln;
        }
    }

    /**
     *  Get random ad from database and return data
     */
    function getAd() {
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM Ads order by rand() limit 1";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $temp['Id'] = $row["Id"];
        $temp['Title'] = $row["Title"];
        $temp['Url'] = $row["Url"];
        $temp['Description'] = $row["Description"];
        $this->results = $temp;
    }

    function getResults() {
        return $this->results;
    }

    /**
     *  Increment counter for ad by 1
     */
    function increment() {
         $db = parent::connect();
            $temp;
            $query = "SELECT * FROM Ads WHERE ID=" . $this->param;
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
            $newCount = $row['Counter'] + 1;
            $query = "UPDATE Ads SET Counter=$newCount WHERE Id=$this->param";
            mysqli_query($db, $query);
    }

    /**
     *  Increment counter for ad by 1, but this should expose vulnerabilities
     *  for SQL injection.
     */
    function incrementVuln() {

    }
}
?>