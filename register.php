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
	
        
        <div>
        
            <!-- registration or username -->
            <?php include 'log-state.php'; ?>

            <!-- masthead -->
            <?php include 'masthead.php'; ?>

            <!-- navigation -->
            <?php include 'navigation.php'; ?>
            
            <!-- content -->
            <div class="content">
                <h1 class="center-title">Register</h1>
                
                <div>
                    <div class="aligner row">
                        <h2>I want to become a Volunteer!</h2>
                        <div id="btnReg">
                            <h3><a href="vol-form.php">Register as a volunteer!</a></h3>
                        </div>
                        <div id="btnReg" class="fb">
                            <h3><a href="vol-form.php">Register with Facebook!</a></h3>
                        </div>
                    </div>
                    <div class="aligner row">
                        <h2>Our Organisation is seeking volunteers!</h2>
                        <div id="btnReg">
                            <h3><a href="org-form.php">Register as an organisation!</a></h3>
                        </div>
                    </div>
                </div>
                
                <div id="register-blanket">
                
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>