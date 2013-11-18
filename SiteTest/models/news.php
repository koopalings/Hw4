<?php

require_once(MODELS . '/model.php');

/**
 *  THe purpose of the class will be to retrieve news from DB.
 *
 */

class News extends Model {

    function __construct() {
        parent::__construct();
    }

    /**
     *  Get 10 news from database and return them in random order
     */
    function getNews() {
        $db = parent::connect();
        $temp;
        $query = "SELECT * FROM News ORDER BY RAND()";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        for ($i = 0; $i < $count; $i++) {
            $row = mysqli_fetch_assoc($result);
            $temp[$i]['Title'] = $row["Title"];
            $temp[$i]['Url'] = $row["Url"];
            $temp[$i]['Description'] = $row["Description"];
        }

        return $temp;
    }
}
?>