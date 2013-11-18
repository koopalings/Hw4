<?php

    $format = $_REQUEST['format'];
    $url = 'http://' .  $_SERVER['SERVER_NAME'] . 
        '/Hw4/BestSiteAd/index.php/get-ad/?format='.$format;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $content = curl_exec($ch);
    curl_close($ch);
?>