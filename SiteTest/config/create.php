<?php
    require_once("config.php");

    // connect to mysql database
    $db = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);

        
      //  select newly created DB
      mysqli_select_db($db, DBNAME);

      //  if database is newly created, create table for limericks
      $query = "CREATE TABLE IF NOT EXISTS News (
                Title varchar(128) NOT NULL,
                Url varchar(256) NOT NULL,
                Description tinytext NOT NULL,
                PRIMARY KEY (Url))";
      mysqli_query($db, $query);

      // insert some initial poems into the database
      $query = <<<EOD
INSERT INTO News (Title, Url, Description) VALUES
('BatKid - a good deed gone viral', 
'http://news.yahoo.com/batkid-%E2%80%93-a-good-deed-gone-viral-
165006958.html', 
'What began with a cancer-stricken boy named Miles and his dream of fighting 
crime ended up captivating celebrities, firing up the president, and bringing 
regular office folks to tears at their desks. '),
('Robotics CEO: 12-Year-Old Whiz As Smart As Ph.Ds', 
  'http://news.yahoo.com/blogs/this-could-be-big-abc-news/robotics-ceo-12-old-
wiz-smart-ph-ds-194012375.html', 
  'When Ted Larson, the CEO of a Silicon Valley robotics firm, hired Rohan 
  Agrawal as his summer intern this year he was skeptical that Rowan could 
  keep up with his team’s pace. '),
('Philippines typhoon: UK commits extra £30m in aid', 
  'http://www.bbc.co.uk/news/uk-24970066', 
  'The UK government is to give an extra £30m in emergency aid following the 
  devastating Philippines typhoon, 
  Prime Minister David Cameron has announced.'),
('Gamers line up by the thousands for PlayStation 4 launch', 
  'http://www.cnn.com/2013/11/15/tech/gaming-gadgets/playstation-4-launch/
index.html?hpt=hp_bn5', 
  'It was a scene that played out at thousands of stores across North America. 
  In New York, Sony rented out the entire Standard High Line Hotel in Manhattan, 
  where roughly 500 people showed up to watch a light show of video-game 
  scenes as they waited for the'),
('Who Got Rich This Week: Cosmetics Maven Jane Lauder, Youngest Female 
  Billionaire In America', 
  'http://www.forbes.com/sites/alexmorrell/2013/11/15/who-got-rich-this-week-
cosmetics-maven-jane-lauder-youngest-female-billionaire-in-america/', 
  'Each week at Forbes we scan our database of corporate insiders to see who 
  got richer from the action in the stock market.'),
('Xbox One Vs. PS4: The Console Wars Are Just Getting Started', 
  'http://www.forbes.com/sites/erikkain/2013/11/16/xbox-one-vs-ps4-the-console-
wars-are-just-getting-started/', 
  'It''s quite possible that all that momentum Sony''s had leading up to the 
  launch of the PS4 will dry up now that the machine is in the wild.'),
('The 20 People Skills You Need To Succeed At Work', 
  'http://www.forbes.com/sites/jacquelynsmith/2013/11/15/the-20-people-skills-
you-need-to-succeed-at-work/', 
  'Do you think you''re qualified for a particular job, fit to lead a team, or 
  entitled to a promotion because you have extensive experience and highly 
  developed technical skills?'),
('What Grain Is Doing To Your Brain', 
  'http://www.forbes.com/sites/nextavenue/2013/11/14/what-grain-is-doing-to-
your-brain/', 
  'The neurologist and president of the Perlmutter Health Center in Naples, 
  Fla., believes all carbs, including highly touted whole grains, are 
  devastating to our brains. '),
('10 people injured at Coliseum during and after USC-Stanford game ', 
  'http://www.latimes.com/local/lanow/la-me-ln-10-people-injured-usc-stanford
-20131116,0,732337.story', 
  'At least 10 people were injured at the Los Angeles Memorial Coliseum 
  Saturday, some when they rushed the field after USC football team''s upset 
  win over No.'),
('Moss Beach: Low tide beckons starfish and sea anemone seekers', 
  'http://www.mercurynews.com/breaking-news/ci_24538847/moss-beach-low-tide-
beckons-starfish-and-sea', 
  'The first extreme low tide of the season beckoned hundreds of starfish and 
  sea anemone seekers to Fitzgerald Marine Reserve on Saturday, where tidal 
  pools that have been under eight feet of water for months revealed 
  themselves.');
EOD;

        mysqli_query($db, $query);
?>