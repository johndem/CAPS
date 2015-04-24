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
        <script src="form-check.js"></script>
    </head>
    <body>
		
        
        <div>
		
			<!-- registration or username -->
            <?php include 'log-state.php'; ?>

            <!-- masthead -->
            <?php include 'masthead.php'; ?>

            <!-- navigation -->
            <?php include 'navigation.php'; ?>
            
            <!-- content -->
            <div class="content">
                <h1 class="center-title">Login</h1>
                
                <div class="aligner">
                    <div><p>Not yet registered? Signing up is easy and takes less than 5 minutes. <a href="register.php">Click here to get started</a> »</p></div>
                    
                    <!--<form id="form" action="log.php" target="_self" method="post" name="log-form">-->
                    <form id="form" name="log-form">
                       
                       <div class="label-in">
                         <div class="h3"> Username or Email: </div>
                            <input class="in" maxlength="50" name="user" id="log-username" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" size="25" type="text" value="" />
                        </div> 
                        
                        <div class="label-in">
                         <div class="h3">Password: </div>
                            <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="password" required value="" />
                        </div>
                       
                        <!--<div id="go">
                            <input type="submit" class="submitBtn" name="submit" value="Go" />
                        </div> -->
                    </form>
                    
                    <div id="go">
                        <input type="submit" class="submitBtn" onclick="getLogResponse()" id="sButton" name="submit" value="Go" />
                    </div>
                    
                    <div><a href="">Forgot your password?</a></div>
                    
                    <div id="results">
                        <ul id="res-ul"></ul>
                    </div>
                    
                </div>
                
                <div id="login-blanket">
                
                </div>
                
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>