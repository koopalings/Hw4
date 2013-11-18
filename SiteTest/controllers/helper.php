<?php
/**
 *  Class to help with functions that include looping and concatenating.
 */
class Helper {

    /**
     *  Iterates through array and returns HTML for view to draw news
     */
    static function toHTMLStr($news) {
        $title = $news[0]['Title'];
        $url = 'index.php?c=increment&id=0&url=' . $news[0]['Url'];
        $description = $news[0]['Description'];
        $str = <<<EOD
        <div class="news-container">
            <h2><a href="$url">$title</a></h2>
            <p>$description</p>
        </div>
        <div id="advertisement">
        </div>
EOD;
        for ($i = 1; $i < sizeof($news); $i++) {
            $title = $news[$i]['Title'];
            $url = 'index.php?c=increment&id=0&url=' . $news[$i]['Url'];
            $description = $news[$i]['Description'];
            $newStr = <<<EOD
        <div class="news-container">
            <h2><a href="$url">$title</a></h2>
            <p>$description</p>
        </div>
EOD;
            $str = $str . $newStr;
        }

        return $str;
    }
}
?>