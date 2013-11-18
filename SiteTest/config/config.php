<?php
    // PATH: APPLICATION ROOT
    define('APP_ROOT', dirname(dirname(__FILE__))  . '/');

    // PATH: CONTROLLERS
    define('CONTROLLERS', APP_ROOT . 'controllers');

    // PATH: CSS
    define('CSS', APP_ROOT . 'css');

    // PATH: ENTRIES
    define('JS', APP_ROOT . 'js');

    // PATH: MODELS
    define('MODELS', APP_ROOT . 'models');

    // PATH: VIEWS
    define('VIEWS', APP_ROOT . 'views');

    // Name of site
    define('SITENAME', 'SiteTest');

    //  name of database server
    define('DBSERVER', '127.0.0.1');

    //  database user name
    define('DBUSER', 'root');

    //  database password
    define ('DBPASSWORD', null);

    //  database name
    define ('DBNAME', 'Vys_Hw4');

    //  table name
    define ('TABLENAME', 'News');

    //  Format to display results from web service
    define('FORMAT', 'json');

?>

<script>
    var siteTest = {
        format : 'json'
    }
</script>