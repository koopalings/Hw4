Vy Luong, 006149520

==============================================================
How to Configure BestSiteAd
==============================================================

1. In the file BestSiteAd/config/config.php, change these
    values to allow database access:
    DBSERVER    - specify the database server
    DBUSER      - username for database
    DBPASSWORD  - password for database

2. By default, the root directory is named Hw4, and it
    contains the directory BestSiteAd. Throughout this 
    readme, I will use these directories in my examples. If 
    you have change the name of these directories, please 
    make sure to update the path in the examples accordingly.

==============================================================
How to Create Database
==============================================================

Execute BestSiteAd/config/create.php from the command line.

Example for Max OS:
> php create.php

==============================================================
How to Run the Web App
==============================================================

Navigate to:

http://<your_server>/Hw4/BestSiteAd/ OR 
http://<your_server>/Hw4/BestSiteAd/index.php

==============================================================
How to Test SQL Injection
==============================================================

This vulnerability will allow a user to increment more than 
one counter per request, which is not the expected behavior. 
To test this vulnerability, copy and paste this URI into the 
browser (assuming that the directories are named Hw4 and BestSiteAd):

<your_server>/Hw4/BestSiteAd/index.php/increment-vulnerable/?id=2 OR id=3

As you make this GET request (from the browser), the row with 
id == 2 and id == 3 will have its counter incremented. To test 
that this is an intended vulnerability, try to do the same with 
method increment-choice -- you will receive an error.