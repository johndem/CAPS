<?php session_start(); ?>
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

        
            <!-- registration -->
            <?php include 'log-state.php'; ?>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>

            <!-- content -->
            <div class="content">
                <?php echo '<h1 class="center-title">Welcome ' . $_SESSION['username'] . '!</h1>' ?>
                

                
                <div id="blanket">
                
                </div>

            </div>

            <!-- footer -->
            <div class="footer">

                <div id="links">
                    <a href="">Login</a>
                    <a href="">Terms and Conditions</a>
                    <a href="">Privacy Policy</a>
                </div>

                <div id="copyright">
                    <p>Copyright &copy; 2015 JayTee. All Rights Reserved.</p>
                </div>

            </div>

        

    </body>


</html>