<!DOCTYPE html>
<html lang="el">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Vol4All</title>
		<meta name="description" content="An interactive getting started guide for Brackets.">
		<link rel="stylesheet" href="../main.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<!-- <script src="https://apis.google.com/js/client:platform.js?onload=api" async defer></script> -->
		<script src="googleplus2.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="jq.js"></script>
		<script src="complete-event.js"></script>
	</head>
	<body>
        
        <?php session_start(); ?>

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
                <div class="main-title"> Volunteering event completion </div>  
                <h4> Select the volunteers that attended </h4>
            </div>

            <div class="aligner"> 
            
                <div class="listplz">   
                    <?php 
                    if (!isset($_SESSION["org_id"])) {
                        header ("Location: index.php");
                    }

                    $org_id = $_SESSION["org_id"];
                    $eventid = $_GET["eventid"];

                    mysqli_set_charset($link, "utf8");

                    include "../back-end/create-link.php";

                    $query ="SELECT user.id, user.username, user.firstname, user.lastname, user.email, skills.skill, apply.selected FROM user, apply, skills,events WHERE apply.selected = '1' AND user.id = apply.volunteerID AND skills.value = apply.skill_id AND apply.eventID = '$eventid' AND events.id = '$eventid' AND events.org_id = '$org_id'" ;
                    $results = mysqli_query($link,$query); ?>
                    
                    <form action="finish-event.php" method="post" id="participation-form">
                            
                        <?php while ($row = mysqli_fetch_row($results)) { ?>

                        <div class="listitem"> 

                            <table> 

                                <tr> 
                                    <th>Full Name </th>
                                    <th>Email </th>
                                    <th>Skill </th>
                                    <th>Participation</th>
                                </tr>
                                <tr> 
                                    <td class="info"><?php echo $row[2]. " " . $row[3]; ?> </td>
                                    <td class="info"><?php echo $row[4]; ?> </td>     
                                    <td class="info"><?php echo $row[5]; ?> </td>     
                                    <td class='actions'><input type="checkbox" name="participant[]" value="<?php echo $row[0]; ?>" /></td>
                                </tr>

                            </table>

                        </div>


                        <?php } ?>
                        
                        <input type="hidden" name="eventid" value="<?php echo $eventid; ?>">
                        
                        <h4> Selecting "Complition" you declare this event completed </h4>
                        <div id="go">
                            <input type="submit" class="submitBtn" id="sButton" name="submit" value="Complition" />
                        </div>
                        
                    </form>

                </div>
                
                
    
                <div id="account-blanket">
                
                </div>
                
            </div>
            
        </div>    

        <!-- footer -->
        <?php
        include 'footer.php';
        ?>
        
	</body>
</html>