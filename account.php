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
            
                <?php if(isset($_SESSION['org']) || isset($_SESSION['user'])) { 
                    include 'find-user.php';
                ?>
                <h1 class="center-title">My Account</h1>
                
                <div id="account"> 
                    
                    <div id="account-left">
                        <div id="info">
                            <div id="pic">
                                <img src="<?php if(isset($_SESSION['org'])) { echo $row[10]; } else { echo $row[12]; } ?>" width="200" height="200" />
                            </div>
                            <div id="personal-info">
                                <?php if(isset($_SESSION['org'])) { ?>
                                    <div class="account-label-in">
                                        <div class="h3">Name:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="text" value="<?php echo $row[4]; ?>" readonly/>
                                    </div>
                                    <div class="account-label-in">
                                        <div class="h3">Email:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="text" value="<?php echo $row[2]; ?>" readonly/>
                                    </div>
                                    <div class="account-label-in">
                                        <div class="h3">  Organisation description:</div>
                                        <textarea id="description" class="for-text-area" cols="35" name="description" maxlength="500" rows="7" readonly><?php echo $row[9]; ?></textarea>
                                    </div>
                                <?php } else if(isset($_SESSION['user'])) { ?>
                                    <div class="account-label-in">
                                        <div class="h3">First Name:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="text" value="<?php echo $row[1]; ?>" readonly/>
                                    </div>
                                    <div class="account-label-in">
                                        <div class="h3">Last name:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="text" value="<?php echo $row[2]; ?>" readonly/>
                                    </div>
                                    <div class="account-label-in">
                                        <div class="h3">Email:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="text" value="<?php echo $row[4]; ?>" readonly/>
                                    </div>
                                    <div class="account-label-in">
                                        <div class="h3">Date of Birth:</div>
                                        <input class="in" maxlength="50" name="pass" id="log-password" size="20" type="date" value="<?php echo $row[11]; ?>" readonly/>
                                    </div>
                                <?php } ?>
                                <div class="account-label-in"><a href="edit-account.php">Edit my account &raquo;</a></div>
                            </div>
                        </div>
                    
                        <div id="history">
                            <h2>Participation History</h2>
                            <div id="history-list">
                                <div class="history-event">
                                    <h3>National animal care day!</h3>
                                    <p>We gather all our friends and go to Harilaou to help the animals. We find shelter for them, bathe them
                                    ,feed them and... hug them. This city rocks!</p>
                                    <h5>Posted by: Parallaximag</h5>
                                    <h5>Category: Animals</h5>
                                    <h5>Date: 02/05/2015</h5>
                                    <h5>Area: Harilaou</h5>
                                    <a href="<?php echo "event.php?id=" . $row[0]; ?>">Read more &raquo;</a>
                                </div>
                                <div class="history-event">
                                    <h3>National animal care day!</h3>
                                    <p>We gather all our friends and go to Harilaou to help the animals. We find shelter for them, bathe them
                                    ,feed them and... hug them. This city rocks!</p>
                                    <h5>Posted by: Parallaximag</h5>
                                    <h5>Category: Animals</h5>
                                    <h5>Date: 02/05/2015</h5>
                                    <h5>Area: Harilaou</h5>
                                    <a href="<?php echo "event.php?id=" . $row[0]; ?>">Read more &raquo;</a>
                                </div>
                                <div class="history-event">
                                    <h3>National animal care day!</h3>
                                    <p>We gather all our friends and go to Harilaou to help the animals. We find shelter for them, bathe them
                                    ,feed them and... hug them. This city rocks!</p>
                                    <h5>Posted by: Parallaximag</h5>
                                    <h5>Category: Animals</h5>
                                    <h5>Date: 02/05/2015</h5>
                                    <h5>Area: Harilaou</h5>
                                    <a href="<?php echo "event.php?id=" . $row[0]; ?>">Read more &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="account-right">
                        <div id="achievements">
                            <h2>Achievements</h2>
                            <div id="achievement-list">
                                <div class="achievement">
                                    <img src="images/achiev-thumb.png" width="70" height="70" />
                                    <div class="achievement-body">
                                        <div>My Own Account!</div>
                                        <div>10 points</div>
                                    </div>
                                </div>
                                <div class="achievement">
                                    <img src="images/vi.png" width="60" height="60" />
                                    <div class="achievement-body">
                                        <div>I Am A Volunteer!</div>
                                        <div>25 points</div>
                                    </div>
                                </div>
                                <div class="achievement">
                                    <img src="images/achiev-edu.png" width="70" height="70" />
                                    <div class="achievement-body">
                                        <div>Education Apprentice!</div>
                                        <div>15 points</div>
                                    </div>
                                </div>
                                <div class="achievement">
                                    <img src="images/achiev-animals.png" width="70" height="70" />
                                    <div class="achievement-body">
                                        <div>Animal Carer!</div>
                                        <div>15 points</div>
                                    </div>
                                </div>
                            </div>
                            <div id="score">
                                <h3>Total Points earned: 65</h3>
                            </div>
                        </div>
                    
                        <div id="pin">
                            <h2>Redeem participation code</h2>
                            <div id="pin-stuff">
                                <form>
                                    <div class="h3">Code:</div>
                                    <input class="in" maxlength="15" name="pin" id="pin" size="15" type="text" />
                                </form>
                                <div id="go">
                                    <input type="submit" class="submitBtn" onclick="" id="sButton" name="submit" value="Redeem" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        
                </div>
                <?php } else { ?>
                    
                    <h1 class="center-title">Create your account and get started!</h1>
                
                <div id="default-account-tab">
                
                <?php
                        echo '<div class="side-widgets">'; 
                        include 'quick-search-widget.php';
				//include 'most-recent-event-widget.php';
                        echo '</div>';
                        ?>
                  
                        <div class="org-info">
                            <h3>All you need to do is sign up!</h3>
                            <p>You will need the following info to complete your registration: </p>
                            <ul>
                                <li>A username and a password for login</li>
                                <li>A valid and active email</li>

                                <div class="org-info-btn">
                                    <h3><a href="register.php">Register here &raquo;</a></h3>
                                </div>
                            </ul>
                         </div>
                    
                        </div>
                    <?php } ?>
                
                <div id="account-blanket">
                
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>