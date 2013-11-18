Vy Luong, 006149520

==============================================================
How to Configure SiteTest
==============================================================

1. In the file SiteTest/config/config.php, change these
    values to allow database access:
    DBSERVER    - specify the database server
    DBUSER      - username for database
    DBPASSWORD  - password for database

2. By default, the root directory is named Hw4, and it
    contains the directory SiteTest. Throughout this 
    readme, I will use these directories in my examples. If 
    you have change the name of these directories, please 
    make sure to update the path in the examples accordingly.

==============================================================
How to Create Database
==============================================================

!IMPORTANT: You need to run BestSiteAd/config/create.php before 
proceeding.

Execute SiteTest/config/create.php from the command line.

Example for Max OS:
> php create.php

==============================================================
How to Run the Web App
==============================================================

Navigate to:

http://<your_server>/Hw4/SiteTest/ OR 
http://<your_server>/Hw4/SiteTest/index.php