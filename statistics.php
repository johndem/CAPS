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
                <h4>Volunteering statistics and leaderboard</h4>
            </div>
            
                
                
            <div id="default-account-tab">
                
                <?php
                echo '<div class="side-widgets">'; 
                include 'quick-search-widget.php';
				include 'most-recent-event-widget.php';
                echo '</div>';
                ?>
                  
                <div class="org-info">
                    <h3>All you need to do is sign up!</h3>
                    <p>You will need the following info to complete your registration: </p>
                    <ul>
                        <li>A username and a password for login</li>
                        <li>A valid and active email</li>

                        <div class="org-info-btn">
                            <h3><a href="register.php">Register here &raquo;</a></h3>
                        </div>
                    </ul>
                    
                    <?php include 'leaderboard.php'; ?>
                    
                 </div>
                    
            </div>
                    
                
            <div id="account-blanket">

            </div>
                
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>
            
       
    </body>
    
   
</html>