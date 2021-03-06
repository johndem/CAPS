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
		<script src="approve.js"></script>
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
                <div class="main-title"> Volunteer selection page </div>  
                <h4>Search and select volunteers</h4>
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

                $query ="SELECT user.id, user.username, user.firstname, user.lastname, user.email, apply.selected, apply.skill_id FROM user, apply, events WHERE user.id = apply.volunteerID AND apply.eventID = '$eventid' AND events.id = '$eventid' AND events.org_id = '$org_id'" ;
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { 
                    
                ?>

                    <div class="listitem"> 

                        <table> 

                            <tr> 
                                <th>Full Name </th>
                                <th>Email </th>
                                <th>Message </th>
                                <th>Actions</th>
                            </tr>
                            <tr> 
                                <td class="info"><?php echo $row[2]. " " . $row[3]; ?> </td>
                                <td class="info"><?php echo $row[4]; ?> </td>     
                                 <td class="info"><?php echo $row[6]; ?> </td>     
                                 <?php if ($row[5] == 0 ) { ?>
                                <td class='actions'><span onclick="onselected(<?php echo $eventid; ?>,<?php echo $row[0]; ?>)">Select</span></td>
                                <?php } else { ?>
                                <td class='actions-selected'><span >Selected</span></td>
                                <?php } ?>
                            </tr>

                        </table>

                    </div>
                    
                <?php } ?>
        
                </div>
                
                <div id="account-blanket">
                
                </div>
            </div>
            
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>
        
	</body>
</html>