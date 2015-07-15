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
                <script src="form-check.js"></script>
    </head>
    <body>

        <?php 

                session_start();

                if (!isset($_SESSION['admin'])) { ?>


            <div class="aligner">
           <form id="form" name="log-form">

                        <div class="label-in">
                            <div class="h3">
                                Username:
                            </div>
                            <input class="in" maxlength="50" name="user" id="log-username" size="25" type="text" value="" />
                        </div>

                        <div class="label-in">
                            <div class="h3">
                                Password:
                            </div>
                            <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="password" required value="" />
                        </div>

                        <!--<div id="go">
                        <input type="submit" class="submitBtn" name="submit" value="Go" />
                        </div> -->
                    </form>

                    <div id="go">
                        <input type="submit" class="submitBtn" onclick="getLogResponse()" id="sButton" name="submit" value="Go" />
                    </div>

                    <div id="results">
                        <ul id="res-ul"></ul>
                    </div>

</div>

<?php } else { ?>

        <!-- masthead -->
        
        <div class="center-title"> <h3>ADMIN CONTROL PANEL</h3> </div>

        <!-- navigation -->
         <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">

            
            <div id="home-blanket">

            </div>

        </div>

<?php } ?>
        
    </body>

</html>