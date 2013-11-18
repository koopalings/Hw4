<?php
    /**
     * index.php will display a header and footer; all other tasks will be
     *  delegated to Main controller.
     */

    require_once('config/config.php');
    require_once(CONTROLLERS . '/main.php');
    require_once(CONTROLLERS . '/increment-proxy.php');
    require_once(VIEWS . '/header.php');

    session_start();

    if (isset($_REQUEST['c']) == "increment") {
        $proxy = new IncrementProxy();
    } else
        $main = new Main();
    require_once(VIEWS . '/footer.php');

?>