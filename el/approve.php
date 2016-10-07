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
                <div class="main-title"> Σελίδα επιλογής εθελοντών </div>  
                <h4>Αναζητήστε εθελοντές/τριες και επιλέξτε </h4>
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

                $query ="SELECT user.id, user.username, user.firstname, user.lastname, user.email, skills.skill, apply.selected FROM user, apply, skills,events WHERE user.id = apply.volunteerID AND skills.value = apply.skill_id AND apply.eventID = '$eventid' AND events.id = '$eventid' AND events.org_id = '$org_id'" ;
                $results = mysqli_query($link,$query);

                while ($row = mysqli_fetch_row($results)) { 
                    
                ?>

                    <div class="listitem"> 

                        <table> 

                            <tr> 
                                <th>Όνοματεπώνυμο </th>
                                <th>Email </th>
                                <th>Αιτούντες δεξιότητες </th>
                                <th>Ενέργειες</th>
                            </tr>
                            <tr> 
                                <td class="info"><?php echo $row[2]. " " . $row[3]; ?> </td>
                                <td class="info"><?php echo $row[4]; ?> </td>     
                                 <td class="info"><?php echo $row[5]; ?> </td>     
                                 <?php if ($row[6] == 0 ) { ?>
                                <td class='actions'><span onclick="onselected(<?php echo $eventid; ?>,<?php echo $row[0]; ?>)">Επιλογή</span></td>
                                <?php } else { ?>
                                <td class='actions-selected'><span >Επιλέχθηκε</span></td>
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