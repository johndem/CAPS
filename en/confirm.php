<!DOCTYPE html>
<html lang="el">
	<head>
		<meta charset="utf-8">
		<!-- <meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login" />
		<meta name="google-signin-requestvisibleactions" content="http://schema.org/AddAction" />
		<meta name="google-signin-cookiepolicy" content="single_host_origin" />
		<meta name="google-signin-clientid" content="833122714001-dpnlqanm3n5pkeqme6q0tl6pppo5uq67.apps.googleusercontent.com" /> -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Vol4All</title>
		<meta name="description" content="An interactive getting started guide for Brackets.">
		<link rel="stylesheet" href="../main.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<!-- <script src="https://apis.google.com/js/client:platform.js?onload=api" async defer></script> -->
		<script src="googleplus2.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://apis.google.com/js/api:client.js?onload=startApp"></script>

		<script src="jq.js"></script>
		<script src="form-check.js"></script>
	</head>
	<body>
        
        <?php 
        session_start();
		if (isset($_SESSION['user'])) {
			header("Location: index.php");
		}	
        ?>

		<!-- registration or username -->
		<?php //include 'log-state.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            
            <h1 class="center-title"></h1>
            <div class="page-title"> 
                <div class="main-title">Congratulations!</div>  
            </div>
            
            <p style="font-size:20px; margin-top: 50px;" class="aligner">Your account has been successfuly created!</p>
            <p style="font-size:20px;" class="aligner"> <a href="login.php" id="confirm-link">Login</a> to your account to begin!</p>
                
            <div id="blanket">
            </div>

        </div>

        <!-- footer -->
        <?php
        include 'footer.php';
        ?>

	</body>

</html>