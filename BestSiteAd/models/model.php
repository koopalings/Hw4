<?php
    class Model {

        function __construct() {

            //  connect to mysql
            $db = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);

            // select database
            mysqli_select_db($db, DBNAME);
        }

        function connect() {
            //  connect to mysql
            $db = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);

            // select database
            mysqli_select_db($db, DBNAME);
            return $db;
        }
    }
?>