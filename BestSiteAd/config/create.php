<?php
    require_once("config.php");

    // connect to mysql database
    $db = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);

    // create database and table
    if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS " . DBNAME) === TRUE) {
        
        //  select newly created DB
        mysqli_select_db($db, DBNAME);

        //  if database is newly created, create table for limericks
        $query = "CREATE TABLE IF NOT EXISTS Ads (
                  Id int(4) NOT NULL,
                  Title varchar(128) NOT NULL,
                  Url varchar(128) NOT NULL,
                  Description tinytext NOT NULL,
                  Counter int(4) NOT NULL DEFAULT '0',
                  PRIMARY KEY (Id))";
        mysqli_query($db, $query);

        // insert some initial poems into the database
        $query = <<<EOD
INSERT INTO Ads (Id, Title, Url, Description, Counter) VALUES
(0, 'Dummy', 'Dummy', 'Dummy', 0),
(1, 'Tide Vivid White and Bright Liquid Laundry Detergent', 
  'http://www.tide.com/en-US/product/tide-vivid-white-and-bright.jspx', 
  'Tide Vivid White + Bright contains no chlorine bleach and has an ingredient 
  that neutralizes the chlorine in your water, so it''s safe for all your 
  machine-washable clothes and won''t cause colored garments to fade.', 0),
(2, 'Cheer for Darks Laundry Detergent', 
  'http://www.cheer.com/products/cheer-for-darks-detergent.php', 
  'Use Cheer Dark to help keep your blacks, 
  navies and eggplants dramatic and mysteriously dark.', 0),
(3, 'Gain Icy Fresh Fizz Oxi Boost 2-in-1 Freshlock', 
  'http://www.ilovegain.com/laundry-detergent/icy-fresh-fizz-high-efficiency
-liquid', 
  'Once you discover the cool aroma and cleaning power of Gain Icy Fresh Fizz 
  HE laundry detergent, you might be tempted to yodel about it from the 
  mountaintops. Yodelayheehoo.', 0);
EOD;

        mysqli_query($db, $query);
    }

?>