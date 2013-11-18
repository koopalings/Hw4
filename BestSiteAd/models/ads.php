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
        array("get-ad", "increment-choice", "increment-vulnerable");

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
            case "get-ad":
                $this->getAd();
                break;
            case "increment-choice":
                $this->increment();
                break;
            case "increment-vulnerable":
                $this->incrementVuln();
        }
    }

    /**
     *  Get random ad from database and return data
     */
    function getAd() {
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM Ads where id <> 0 order by rand() limit 1";
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
        if (!is_numeric($this->param)) {
            $this->results = false;
            return false;
        }
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM Ads WHERE ID=" . $this->param;
        $result = mysqli_query($db, $query);
        if (!$result) {
            $this->results = false;
            return false;
        } else
            $this->results = true;
        $row = mysqli_fetch_assoc($result);
        $newCount = $row['Counter'] + 1;
        $query = "UPDATE Ads SET Counter=$newCount WHERE Id=$this->param";
        mysqli_query($db, $query);
    }

    /**
     *  Increment counter for ad by 1, but this should expose vulnerabilities
     *  for SQL injection. Try query string: ?id=2 OR id=3
     */
    function incrementVuln() {
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM Ads WHERE ID=" . $this->param;
        $result = mysqli_query($db, $query);
        if (!$result) {
            $this->results = false;
            return false;
        } else
            $this->results = true;
        $row = mysqli_fetch_assoc($result);
        $newCount = $row['Counter'] + 1;
        $query = "UPDATE Ads SET Counter=$newCount WHERE Id=$this->param";
        mysqli_query($db, $query);
    }

    /**
     *  Sets the counter for all ads to zero.
     */
    static function resetCounter() {
        $db = parent::connect();
        $query = "UPDATE Ads set counter = 0";
        $result = mysqli_query($db, $query);
    }

    /**
     *  Returns all ads in an array; each ad object should have:
     *  - counter value
     *  - title
     *  - id
     */
    static function getAllAds() {
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM Ads where id <> 0";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        for ($i = 0; $i < $count; $i++) {
            $row = mysqli_fetch_assoc($result);
            $temp[$i]['Id'] = $row["Id"];
            $temp[$i]['Title'] = $row["Title"];
            $temp[$i]['Url'] = $row["Url"];
            $temp[$i]['Description'] = $row["Description"];
            $temp[$i]['Counter'] = $row["Counter"];
        }

        return $temp;
    }

    /**
     *  Delete ad with specified id
     */
    static function deleteAd($id) {
        $db = parent::connect();
        $query = "DELETE FROM Ads WHERE id = $id";
        $result = mysqli_query($db, $query);
    }

    /**
     *  Ad add to database
     */
    static function addAd($title, $url, $description) {
        $db = parent::connect();
        $result = mysqli_query($db, "SELECT COUNT(1) FROM Ads");
        $row = mysqli_fetch_array($result);
        $count = $row[0] + 1;
        $query = "INSERT INTO Ads 
            VALUES ($count, '$title', '$url', '$description', 0)";
        $result = mysqli_query($db, $query);
    }
}
?>