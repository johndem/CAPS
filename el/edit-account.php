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

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>

            <div class="aligner">

                <div id="results">
                    <ul id="res-ul"></ul>
                </div>
                
                <?php  include 'find-user.php'; ?>
                
                <form id="form" name="edit-form">
                    
                    <div class="div-cat">
                        <h1 class="cats">Εικόνα</h1> 
                    </div>
                    
                    <div id="edit-pic">
                        <img src="<?php if(isset($_SESSION['org_id'])) { echo $row[10]; } else { echo $row[12]; } ?>" width="200" height="200" />
                    </div>
                    
                    <input type="file" name="picture" id="prof-pic">
                    
                    <div class="div-cat">
                        <h1 class="cats">Βασικές πληροφορίες</h1> 
                    </div>
                
                    <?php if(isset($_SESSION['org_id'])) { ?>
                        
                        <div class="label-in">
                            <div class="h3"> Όνομα οργανισμού: * </div>
                            <div id="edit-err-name" class="error-message"> </div>
                            <div id="edit-name-span" class="img-span"></div>
                            <input id="edit-org-name" class="in" maxlength="50" name="name" size="30" type="text" value="<?php echo $row[4]; ?>" required/>
                        </div>

                        <div class="label-in">
                            <div class="h3">Ιστοδελίδα: </div>
                            <div id="edit-err-ws" class="error-message"> </div>
                            <div id="edit-ws-span" class="img-span"></div>
                            <input id="edit-website" class="in" name="website" size="30" type="url" value="<?php echo $row[5]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3">  Facebook: </div>
                            <div id="edit-err-fb" class="error-message"> </div>
                            <div id="edit-fb-span" class="img-span"></div>
                            <input id="edit-facebook" class="in" name="facebook" size="30" type="url" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3"> Twitter: </div>
                            <div id="edit-err-tw" class="error-message"> </div>
                            <div id="edit-tw-span" class="img-span"></div>
                            <input id="edit-twitter" class="in" name="twitter" size="30" type="url" value="<?php echo $row[7]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3">  Άλλο: </div>
                            <div id="edit-err-other" class="error-message"> </div>
                            <div id="edit-other-span" class="img-span"></div>
                            <input id="edit-other" class="in" name="other" size="30" type="url" value="<?php echo $row[8]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3">  Περιγραφή οργανισμού: * </div>
                            <div id="edit-err-desc" class="error-message"> </div>
                            <div id="edit-desc-span" class="img-span"></div>
                            <textarea id="edit-description" class="for-text-area" cols="55" name="description" maxlength="500" rows="10" required><?php echo $row[9]; ?></textarea>
                        </div>
                        
                    
                
                    <?php } else if(isset($_SESSION['user'])) { ?>


                        <div class="label-in">
                            <div class="h3"> Όνομα: * </div>
                            <div id="edit-err-first" class="error-message"> </div>
                            <div id="edit-first-span" class="img-span"></div>
                            <input id="edit-first" class="in" maxlength="50" name="first" size="30" type="text" value="<?php echo $row[1]; ?>" required/>
                        </div>

                        <div class="label-in">
                            <div class="h3"> Επίθετο: * </div>
                            <div id="edit-err-last" class="error-message"> </div>
                            <div id="edit-last-span" class="img-span"></div>
                            <input id="edit-last-name" class="in" maxlength="50" name="last" size="30" type="text" value="<?php echo $row[2]; ?>" required/>
                        </div>

                        <div class="label-in">
                            <div class="h3"> Αριθμός τηλεφώνου: </div>
                            <div id="edit-err-phone" class="error-message"> </div>
                            <div id="edit-phone-span" class="img-span"></div>
                            <input id="edit-phone"  class="in" minlength="10" maxlength="10" name="phone" size="30" type="tel" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3"> Διεύθυνση: </div>
                            <div id="edit-err-addr" class="error-message"> </div>
                            <div id="edit-addr-span" class="img-span"></div>
                            <input id="edit-address" class="in" maxlength="50" name="address" size="30" type="text" value="<?php echo $row[7]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3"> Αριθμός: </div>
                            <div id="edit-err-str" class="error-message"> </div>
                            <div id="edit-str-span" class="img-span"></div>
                            <input id="edit-str"  class="in" min="1" max="9999" name="str"  type="number" value="<?php echo $row[8]; ?>" />
                        </div>

                        <div class="label-in">
                            <div class="h3"> Τ.Κ.: </div>
                            <div id="edit-err-zip" class="error-message"> </div>
                            <div id="edit-zip-span" class="img-span"></div>
                            <input id="edit-zip"  class="in" name="zip" type="number" value="<?php echo $row[9]; ?>" min="10000" max="99999"/>
                        </div>

                        <div class="label-in">
                            <div class="h3"> Ημ/νία γέννησης: * </div>
                            <div id="edit-err-dob" class="error-message"> </div>
                            <div id="edit-dob-span" class="img-span"></div>
                            <input id="edit-dob" class="in" name="date" value="<?php echo $row[11]; ?>" required/>
                        </div>


                    <?php } ?>
                    
                </form>

                <p id="required">* Το πεδίο αυτό ειναι υποχρεωτικό </p>
                
                <div id="go">
                    <input type="submit" class="submitBtn" onclick="<?php if (isset($_SESSION['org_id'])){echo "checkEditOrgForm()";}else if(isset($_SESSION['user'])){echo "checkEditVolForm()";} ?>" id="sButton" name="submit" value="Αποθήκευση" />
                </div> 

            </div>

            <div id="reg-blanket"></div>

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>

   <script>     
       
       $(document).ready(function() {
           $("#dob").datepicker({
               dateFormat: "dd-mm-yy"
           });
       });
        
    </script>

    </body>
</html>