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
        <script src="form-check.js"></script>
    </head>
    <body>
	<?php session_start(); ?>
        
        
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
                <li><a href="account.php">ACCOUNT</a></li>
            </ul>
        </div>

        <!-- content -->
        <div class="content">
            <h1 id="haha" class="center-title">Volunteer Registration</h1>

            <div class="aligner">

                <div id="results">
                    <ul id="res-ul"></ul>
                </div>

                <form id="form" name="vol-form">

                    <div class="label-in">
                        <div class="h3"> First name: * </div>
                        <input id="first" class="in" maxlength="50" name="first" size="30" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Last Name: * </div>
                        <input id="last-name" class="in" maxlength="50" name="last" size="30" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Username: * </div>
                        <input id="username" class="in" maxlength="50" name="user" size="30" type="text" value="" />
                        <div id="user-span"></div>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Email: * </div>
                        <input id="email" class="in" maxlength="50" name="email" size="30" type="email" value="" />
                        <div id="email-span"></div>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Password: * </div>
                        <input id="password" class="in" maxlength="50" name="pass" size="30" type="password" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Confirm password: * </div>
                        <input id="con-pass" onkeyup="checkpass()" class="in" maxlength="50" name="con-pass" size="30" type="password" value="" />
                        <div id="pass-span"></div>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Phone number: </div>
                        <input id="phone"  class="in" maxlength="50" name="phone" size="30" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Address: </div>
                        <input id="address" class="in" maxlength="50" name="address" size="30" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Street Number: </div>
                        <input id="str-num"  class="in" maxlength="50" name="str" size="30" type="number" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Zip Code: </div>
                        <input id="zip"  class="in" maxlength="50" name="zip" size="30" type="number" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Date of Birth: * </div>
                        <input id="dob" class="in" maxlength="50" name="date" size="30" type="date" value="" />
                    </div>
                    
                </form>

                <p id="required">* This field is required </p>

                <div id="go">
                    <input type="submit" class="submitBtn" onclick="checkform()" id="sButton" name="submit" value="Register" />
                </div> 

            </div>

            <div id="reg-blanket"></div>

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