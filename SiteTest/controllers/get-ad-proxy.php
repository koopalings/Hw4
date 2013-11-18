<?php

    $format = $_REQUEST['format'];
    $url = 'http://localhost/Hw4/BestSiteAd/index.php/get-ad/?format='.$format;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $content = curl_exec($ch);
    curl_close($ch);
?>