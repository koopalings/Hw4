<?php

class Helper {
    /*
     *  Iterate through the results array and return a string for rendering
     */
    static function toHTML($arr) {
        $str = "";
        foreach($arr as $ad) {
            $id = $ad['Id'];
            $title = $ad['Title'];
            $url = $ad['Url'];
            $description = $ad['Description'];
            $counter = $ad['Counter'];
            $newStr = <<<EOD
            <div class='ad-block'>
                <h2><a href="$url">$title</a></h2>
                <p>$description</p>
                <a href="index.php?delete=$id">Delete</a>
            <div>
EOD;
            $str =  $str . $newStr;
        }
        return $str;
    }
}
?>