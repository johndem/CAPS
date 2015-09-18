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
                    <div class="main-title">Organisation register form</div>  
                    <h4>Please fill in the necessary information about your organisation</h4>
                    </div>
                
                <div class="aligner">
                    
                    <div id="results">
                        <ul id="res-ul"></ul>
                    </div>
                    
                    <form id="form" name="org-form">
                     
                        <div class="label-in">
                        <div class="h3"> Username: * </div>
                        <div id="err-username" class="error-message"> </div>
                        <div id="username-span" class="img-span"></div>
                        <input id="org-username" class="in" minlength="5" maxlength="50" name="user" size="30" type="text" value="" required/>
                        <div id="user-span"></div>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Email: * </div>
                        <div id="err-email" class="error-message"> </div>
                        <div id="email-span" class="img-span"></div>
                        <input id="org-email" class="in" name="email" size="30" type="email" value="" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Password: * </div>
                         <div id="err-password" class="error-message"> </div>
                        <div id="password-span" class="img-span"></div>
                        <input id="password" class="in" minlength="10" maxlength="50" name="pass" size="30" type="password" value="" required/>
                    </div>

                    <div class="label-in">
                        <div class="h3"> Confirm password: * </div>
                        <div id="err-conf" class="error-message"> </div>
                        <div id="conf-span" class="img-span"></div>
                        <input id="con-pass" onkeyup="checkpass()" class="in" minlength="10" name="con-pass" size="30" type="password" value="" required/>
                    </div>
                        
                        <div class="label-in">
                            <div class="h3"> Organisation name: * </div>
                            <div id="err-name" class="error-message"> </div>
                            <div id="name-span" class="img-span"></div>
                            <input id="org-name" class="in" maxlength="50" name="name" size="30" type="text" value="" required/>
                        </div>
                        
                        <div class="label-in">
                            <div class="h3">Website: </div>
                            <div id="err-ws" class="error-message"> </div>
                            <div id="ws-span" class="img-span"></div>
                            <input id="website" class="in" name="website" size="30" type="url" value="" />
                        </div>
                        
                        <div class="label-in">
                            <div class="h3">  Facebook: </div>
                            <div id="err-fb" class="error-message"> </div>
                            <div id="fb-span" class="img-span"></div>
                            <input id="facebook" class="in" name="facebook" size="30" type="url" value="" />
                        </div>
                        
                        <div class="label-in">
                            <div class="h3"> Twitter: </div>
                            <div id="err-tw" class="error-message"> </div>
                            <div id="tw-span" class="img-span"></div>
                            <input id="twitter" class="in" name="twitter" size="30" type="url" value="" />
                        </div>
                        
                        <div class="label-in">
                            <div class="h3">  Other: </div>
                            <div id="err-other" class="error-message"> </div>
                            <div id="other-span" class="img-span"></div>
                            <input id="other" class="in" name="other" size="30" type="url" value="" />
                        </div>
                         
                        <div class="label-in">
                            <div class="h3">  Organisation description: * </div>
                            <div id="err-desc" class="error-message"> </div>
                            <div id="desc-span" class="img-span"></div>
                            <textarea id="description" class="for-text-area" cols="55" name="description" maxlength="500" rows="10" required></textarea>
                        </div>
                        
                    </form>
                    
                    <p id="required">* This field is required </p>
                    
                    <div id="go">
                        <input type="submit" class="submitBtn" onclick="checkorgform()" id="sButton" name="submit" value="Register" />
                    </div> 
                    
                </div>
                
                <div id="reg-blanket"></div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>