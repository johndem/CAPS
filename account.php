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
                    <div class="main-title"> My Account</div>  
                    <h4>Profile information</h4>
                    </div>
            
                <?php if(isset($_SESSION['org_id']) || isset($_SESSION['user'])) { 
                    include 'find-user.php';
                ?>
                
                
                <div id="account"> 
                    
                    <div id="account-left">
                        <div id="info">
                            <div id="pic">
                                <img src="<?php if(isset($_SESSION['org_id'])) { echo $row[10]; } else { echo $row[12]; } ?>" width="200" height="200" />
                            </div>
                            <div id="personal-info">
                                <?php if(isset($_SESSION['org_id'])) { ?>
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
                            
                           
<!--                            <h2>Volunteer History</h2>-->
                            
                            <div id="tabbed_box_1" class="tabbed_box">
                                
                                <?php if(isset($_SESSION['org_id'])) { ?>
                                <h2>Organization Event History</h2>
                                <div class="tabbed_area">

                                    <ul class="tabs">
                                        <li><a href="#" title="content_1" class="tab active">Active Events</a></li>
                                        <li><a href="#" title="content_2" class="tab">Events completed</a></li>
                                        <li><a href="#" title="content_3" class="tab">Events Canceled</a></li>
                                    </ul>

                                    <div id="content_1" class="tab-content">
                                        <ul>
                                            <?php include 'event-history-active.php'; ?>
                                        </ul>
                                    </div>
                                    <div id="content_2" class="tab-content">
                                        <ul>
                                            <?php include 'event-history-completed.php'; ?>
                                        </ul>
                                    </div>
                                    <div id="content_3" class="tab-content">
                                        <ul>
                                            <?php include 'event-history-cancelled.php'; ?>
                                        </ul>
                                    </div>

                                </div>
                                <?php } else if(isset($_SESSION['user'])) { ?>
                                <h2>Volunteer History</h2>
                                <div class="tabbed_area">

                                    <ul class="tabs">
                                        <li><a href="#" title="content_1" class="tab active">Events completed</a></li>
                                        <li><a href="#" title="content_2" class="tab">Events Applied</a></li>
                                    </ul>

                                    <div id="content_1" class="tab-content">
                                        <ul>
                                            <?php include 'volunteer-history.php'; ?>
                                        </ul>
                                    </div>
                                    <div id="content_2" class="tab-content">
                                        <ul>
                                            <?php include 'volunteer-apply-history.php'; ?>
                                        </ul>
                                    </div>

                                </div>
                                <?php } ?>
                                
                                
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
                    
<!--
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
-->
                    </div>
                    
                        
                </div>
                <?php } else { ?>
                    
                    <!-- <h1 class="center-title">Create your account and get started!</h1> -->
                
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