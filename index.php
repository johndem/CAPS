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
            <h1 class="center-title">Volunteer and help your city</h1>
            
            <?php
                include 'create-link.php';

                $query = "SELECT * FROM events ORDER BY id DESC";
                $results = mysqli_query($link,$query);
                

                $rowsFound = 0;

                $featured = array
                (
                    array(0, 0, 0, 0),
                    array(0, 0, 0, 0),
                    array(0, 0, 0, 0),
                );

                while ($row = mysqli_fetch_row($results)) {
                    if ($row[14] != '') {
                        $featured[$rowsFound][0] = $row[0];
                        $featured[$rowsFound][1] = $row[2];
                        $featured[$rowsFound][2] = $row[12];
                        $featured[$rowsFound][3] = $row[14];
                        
                        $rowsFound++;
                    }
                    if ($rowsFound >= 3) {
                        break;    
                    }
                }

                if ($rowsFound == 3) {    
            ?>
            
            <div id="featured">
                <ul>
                    <li>
                        <div class="featured-image">
                            <img src="<?php echo $featured[0][3]; ?>" />
                            <div class="featured-image-text">
                                <?php 
                                    echo '<h2>' . $featured[0][1] . '</h2>';
                                    echo '<h4>' . $featured[0][2] . '</h4>'; 
                                ?>
                                <div class="btnLearn">
                                    <h3><a href="<?php echo "event.php?id=" . $featured[0][0]; ?>">Learn more</a></h3>
                                </div>
                            </div>     
                        </div> 
                    </li>
                    <li>
                        <div class="featured-image">
                            <img src="<?php echo $featured[1][3]; ?>" />
                            <div class="featured-image-text">
                                <?php 
                                    echo '<h2>' . $featured[1][1] . '</h2>';
                                    echo '<h4>' . $featured[1][2] . '</h4>';  
                                ?>
                                <div class="btnLearn">
                                    <h3><a href="<?php echo "event.php?id=" . $featured[1][0]; ?>">Learn more</a></h3>
                                </div>
                            </div>   
                        </div>
                    </li>
                    <li>
                        <div class="featured-image">
                            <img src="<?php echo $featured[2][3]; ?>" />
                            <div class="featured-image-text">
                                <?php 
                                    echo '<h2>' . $featured[2][1] . '</h2>';
                                    echo '<h4>' . $featured[2][2] . '</h4>';  
                                ?>
                                <div class="btnLearn">
                                    <h3><a href="<?php echo "event.php?id=" . $featured[2][0]; ?>">Learn more</a></h3>
                                </div>
                            </div>   
                        </div>
                    </li>
                </ul>
            </div>
            
            <?php } ?>
            
            
            
            
            <div id="categories">
                <h1>Categories</h1>
                
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
                
                <h1>News and Stories</h1>
                
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