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
        <script src="form-check.js"></script>
        <script src="jq.js"> </script>
    </head>
    <body>

    <?php 

        session_start();

            if (!isset($_SESSION['admin'])) { 
                header("Location: index.php");
    ?>


    <?php } else { ?>

        <!-- masthead -->
        
        <div class="center-title"> <h3>ADMIN CONTROL PANEL</h3> </div>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="aligner">
                
                <h1> Δημιουργία νέας είδησης </h1>
                
                <div id="results">
                    <ul id="res-ul"></ul>
                </div>
                
                <form>
                    
                    <div class="label-in">
                        <div class="h3"> Τίτλος: * </div>
                        <div id="err-news-title" class="error-message"> </div>
                        <div id="news-title-span" class="img-span"></div>
                        <input required id="news-title" class="in" maxlength="100" name="title" size="40" type="text" value="" />
                    </div>

                    <div class="label-in">
                        <div class="h3"> Σύντομη περιγραφή: * </div>
                        <div id="err-news-desc" class="error-message"> </div>
                        <div id="news-desc-span" class="img-span"></div>
                        <textarea id="news-desc" class="for-text-area" cols="55" name="description" maxlength="400" rows="7" required></textarea>
                    </div>
                    
                    <div class="label-in">
                        <div class="h3"> Εικόνα είδησης: </div>
                        <div id="file-buttons">
                            <input type="file" name="news-picture" id="news-pic">
                        </div>  
                    </div>
                    
                    <div class="label-in">
                        <div class="h3"> Σώμα είδησης: * </div>
                        <div id="err-news-body" class="error-message"> </div>
                        <div id="news-body-span" class="img-span"></div>
                        <textarea id="news-main-body" class="for-text-area" cols="55" name="news-body" maxlength="1500" rows="20" required></textarea>
                    </div>

                    <p id="required">* Αυτό το πεδίο είναι απαραίτητο </p>
                
                </form>
                
                <div id="go">
                    <input type="submit" class="submitBtn" onclick="checkNewsForm()" id="sButton" name="submit" value="Submit" />
                </div> 

                <div id="home-blanket">

                </div>
                
            </div>
        </div>

    <?php } ?>
        
    </body>

</html>