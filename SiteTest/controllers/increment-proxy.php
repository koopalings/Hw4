<?php

class IncrementProxy {

    function __construct() {
        $id = $_REQUEST['id'];
        $redirect = $_REQUEST['url'];
        $url = 'http://localhost/Hw4/BestSiteAd/index.php/increment-choice/?id='
            .$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $content = curl_exec($ch);
        curl_close($ch);
        header("Location: " . $redirect);
        die();
    }
}
?>