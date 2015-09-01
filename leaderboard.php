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
                <div class="main-title">Statistics</div>  
                <h4>Leaderboard</h4>
            </div>
            
            
                
                
            <div id="statistics">
                
                
                <div id="leaderboard">
                    <h2>Leaderboard</h2>
                    <?php include 'show-leaderboard.php'; ?>     
                </div>
                
                    
            </div>
                    
                
            <div id="account-blanket">

            </div>
                
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>

    </body>
    
   
</html>