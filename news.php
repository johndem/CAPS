<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>
		
        
            <!-- registration or username -->
        <?php //include //'log-state.php'; ?>

        <!-- navigation -->
         <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>

                <?php include 'find-news.php'; ?>
                
                <div id="news-body">
                    <h2><?php echo "$row[1]"; ?></h2>
                    <img class="news-img" src="<?php echo "$row[3]"; ?>" />
                    <?php 
                        echo '<p>' . $row[2] . '</p>'; 
                        echo '<p>' . nl2br($row[4]) . '</p>'; 
                    ?>
                </div>
                
                <div id="blanket">
                
                </div>

            </div>

            <!-- footer -->
            <?php include 'footer.php'; ?>

        

    </body>


</html>