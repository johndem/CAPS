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
		<div>

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
                <div class="main-title"> Login </div>
            </div>
				<div class="aligner">

					<div>
						<p>
							Dont have an account? Registering is quick and easy.<a href="register.php"> Click here to begin </a> »
						</p>
					</div>

					<!--<form id="form" action="log.php" target="_self" method="post" name="log-form">-->
					<form id="form" name="log-form">

						<div class="label-in">
							<div class="h3">
								Username or Email:
							</div>
							<input class="in" maxlength="50" name="user" id="log-username" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" size="25" type="text" value="" />
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
						<input type="submit" class="submitBtn" onclick="getLogResponse()" id="sButton" name="submit" value="Login" />
					</div>

					<div>
						<a href="">Forgot your password?</a>
					</div>

					<div id="results">
						<ul id="res-ul"></ul>
					</div>

					<!-- SOCIAL MEDIA LOGIN -->


					<h3 style="text-align:center">OR LOGIN VIA:</h3>

					<div class="social-buttons">

						<div class="social-container">
							<h4>Facebook</h4>
							<div class="social-login" onclick="window.location = '<?php echo $loginUrl ?>'" id="fb"></div>
						</div>

						<div class="social-container">

							<h4>Twitter</h4>
							<div class="social-login" onclick="window.location = 'twitter-login2.php'" id="tweet"></div>
						</div>

						<div class="social-container">

							<h4>Google+</h4>
							<div class="social-login" id="googleplus"></div>
						</div>

					</div>
				</div>

				<div id="login-blanket">

				</div>

			</div>

			<!-- footer -->
			<?php
			include 'footer.php';
			?>

		</div>

	</body>
</html>
