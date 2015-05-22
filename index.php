<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TEAM THESSALONIKI VOLUNTEER NETWORK</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.jcarousel.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>

        
        <!-- registration or username -->
		<?php include 'log-state.php'; ?>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title">Choose a category and get started!</h1>
            
            
            
            <div id="featured">
                <ul>
                    <li><img src="images/kids.jpg" /></li>
                    <li><img src="images/flowers.jpg" /></li>
                    <li><img src="images/family.jpg" /></li>
                </ul>
            </div>
            
            
            <div id="categories">
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Healthcare'" id="hc" class="cat-img" src="images/hc-gray.png"/>
				</div>
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Education'" id="edu" class="cat-img" src="images/edu-gray.png"/>
				</div>
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Emergency'" id="em" class="cat-img" src="images/em-gray.png"/>
				</div>
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Environment'" id="env" class="cat-img" src="images/env-gray.png"/>
				</div>
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Communities'" id="com" class="cat-img" src="images/com-gray.png"/>
				</div>
				<div class="cat"><img onclick="window.location= 'search-results.php?category=Animals'" id="an" class="cat-img" src="images/an-gray.png"/>
				</div>
			</div>

            <div id="btnOpp">
                <h3><a href="volunteers.php">More Opportunities!</a></h3>
            </div>


            <div id="news">  
                <?php 
                    include 'display-news.php';
                ?>    
            </div>


            <div id="home-blanket">

            </div>

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>

        
    </body>

</html>