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
	<?php session_start(); ?>
        
        <div>
        
            <!-- registration or username -->
			<?php if(isset($_SESSION['user'])){?>
			<div class="logged">     
				<a href="account.php"><div class="username">Welcome, <?php echo $_SESSION['user']; ?>!</div></a>
				<div id="dropdownlist">
					<ul>
						<li><a href="account.php">Edit my profile</a></li>
						<li><a href="index.php">Log Out</a></li>
					</ul>
				</div>
			</div>
			<?php }else{?>
			 <div class="registration">
				<ul>
					<li class="reg"><a href="register.php">Register</a></li>
					<li class="reg"><a href="login.php">Login</a></li>
				</ul>
			</div>  
			<?php } ?>
            
            <!-- masthead -->
            <div class="masthead">
                <h1 id="title">TEAM THESSALONIKI VOLUNTEER NETWORK</h1>
            </div>
            
            <!-- navigation -->
            <div class="navigation">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="volunteers.php">VOLUNTEERS</a></li>
                    <li><a href="organisations.php">ORGANISATIONS</a></li>
                    <li><a href="calendar.php">CALENDAR</a></li>
                    <li id="selected"><a href="account.php">ACCOUNT</a></li>
                </ul>
            </div>
            
            <!-- content -->
            <div class="content">
                <h1 class="center-title">My Account</h1>
                
                
                
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
            
        </div>
       
    </body>
    
   
</html>