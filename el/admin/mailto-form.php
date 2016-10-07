<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vol4All Admin</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="jq.js"></script>
        <script src="form-check.js"></script>
    </head>
    <body>
	
        
        
      <!-- registration or username -->
        <?php //include 'log-state.php'; ?>

        <!-- navigation -->
         <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- content -->
        <div class="content">
            <h1 class="center-title">Φόρμα Αποστολής Email</h1>

            <div class="message"> 
            <?php 

            if (isset($_GET['sucess'])) {
                if ($_GET['sucess'] == 1) echo "Αποστολή email επιτυχής!";
                elseif ($_GET['sucess'] == 0) echo "Υπήρξε πρόβλημα κατά την αποστολή του wmail!";
            }

            ?>

            </div>
 
            <div class="aligner">

                <div id="results">
                    <ul id="res-ul"></ul>
                </div>

                <form id="form" name="vol-form" method="POST" action="send-mail.php">

                    <div class="label-in">
                        <div class="h3"> Προς: * </div>
                        <div id="err-first" class="error-message"> </div>
                        <div id="first-span" class="img-span"></div>
                        <input id="to" class="in" maxlength="50" name="to" size="30" type="email" value="<?php if (isset($_GET['mailToVolunteer'])) { include 'find-vol-email.php'; echo $email[0]; } elseif (isset($_GET['mailToOrganization'])) { include 'find-org-email.php'; echo $email[0]; } ?>" required/>
                    </div>

                    <!-- <div class="label-in">
                        <div class="h3"> From: * </div>
                         <div id="err-last" class="error-message"> </div>
                        <div id="last-span" class="img-span"></div>
                        <input id="from" class="in" maxlength="50" name="from" size="30" type="email" value="" required/>
                    </div> -->

                    <div class="label-in">
                        <div class="h3"> Θέμα: * </div>
                        <div id="err-username" class="error-message"> </div>
                        <div id="username-span" class="img-span"></div>
                        <input id="subject" class="in" maxlength="50" name="subject" size="30" type="text" value="" required/>
                    </div>

                    <div class="label-in">
                            <div class="h3">  Κείμενο: * </div>
                            <div id="err-desc" class="error-message"> </div>
                            <div id="desc-span" class="img-span"></div>
                            <textarea id="text" class="for-text-area" cols="55" name="text" rows="10" required></textarea>
                        </div>

                        <p id="required">* Αυτό το πεδίο είναι απαραίτητο </p>

                        <input type="submit" class="submitBtn" id="sButton" name="submit" value="Αποστολή" />
                    
                </form>


            </div>

            <div id="reg-blanket"></div>

        </div>

    </body>
</html>