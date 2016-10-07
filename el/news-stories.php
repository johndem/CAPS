<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vol4All</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
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
            
            <h1 class="center-title"></h1>
            <div class="page-title"> 
                <div class="main-title">Νέα και Ειδήσεις</div>  
                <h4>Μείνετε ενήμεροι με τα τελευταία νέα!</h4>
            </div>
            
                
            <div id="news-stories">
                
                <?php
                echo '<div class="side-widgets">';
                include 'recent-events-widget.php'; 
                include 'quick-search-widget.php';
                echo '</div>';
                ?>
                 
                <div id="news-list">
                    <?php include '../back-end/display-news.php'; ?>     
                </div>
                     
            </div>
                     
            <div id="account-blanket">

            </div>
                
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>

    </body> 
</html>