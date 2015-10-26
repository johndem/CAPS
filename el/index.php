<!DOCTYPE html>
<html lang="el">
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
        <?php //include 'log-state.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title" style="margin-bottom: 0;"></h1>

            <?php

            include 'create-link.php';

            mysqli_set_charset($link, "utf8");

            $query = "SELECT * FROM events WHERE status='1' ORDER BY id DESC";
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
                                    <h3><a href="<?php echo "event.php?id=" . $featured[0][0]; ?>">Περισσότερα</a></h3>
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
                                    <h3><a href="<?php echo "event.php?id=" . $featured[1][0]; ?>">Περισσότερα</a></h3>
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
                                    <h3><a href="<?php echo "event.php?id=" . $featured[2][0]; ?>">Περισσότερα</a></h3>
                                </div>
                            </div>   
                        </div>
                    </li>
                </ul>
            </div>
            
            <?php } ?>

           <!--  <div id="btnOpp">
                <h3><a href="volunteers.php">More Opportunities!</a></h3>
            </div> -->

            <div id="news"> 
                <div class="page-title"> 
                    <div class="main-title">Ανακοινώσεις και νέα</div>  
                </div>
             
                
                <?php include 'display-latest-news.php'; ?>    
            </div>

            <div id="home-blanket">

            </div>

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>

    </body>
</html>