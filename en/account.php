<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vol4All</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>
            
            <div class="page-title"> 
                <div class="main-title"> My Account </div>  
                <h4>Profile Information</h4>
            </div>
            
                <?php 
                mysqli_set_charset($link, "utf8");
                if(isset($_SESSION['org_id']) || isset($_SESSION['user'])) { 
                    include '../back-end/find-user.php';
                ?>
                
                
                <div id="account"> 
                    
                    <div id="info">
                        <div id="pic">
                            <img src="<?php if(isset($_SESSION['org_id'])) { echo $row[10]; } else { echo $row[12]; } ?>" width="200" height="200" />
                        </div>
                        <div id="personal-info">
                            <?php if(isset($_SESSION['org_id'])) { ?>
                                <div class="account-label-in">
                                    <div class="h3">Name:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="text" value="<?php echo $row[4]; ?>" readonly/>
                                </div>
                                <div class="account-label-in">
                                    <div class="h3">Email:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="text" value="<?php echo $row[2]; ?>" readonly/>
                                </div>
                                <div class="account-label-in">
                                    <div class="h3">  Organization's description:</div>
                                    <textarea id="description" class="for-text-area" cols="40" name="description" maxlength="500" rows="7" readonly><?php echo $row[9]; ?></textarea>
                                </div>
                            <?php } else if(isset($_SESSION['user'])) { ?>
                                <div class="account-label-in">
                                    <div class="h3">First Name:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="text" value="<?php echo $row[1]; ?>" readonly/>
                                </div>
                                <div class="account-label-in">
                                    <div class="h3">Last Name:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="text" value="<?php echo $row[2]; ?>" readonly/>
                                </div>
                                <div class="account-label-in">
                                    <div class="h3">Email:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="text" value="<?php echo $row[4]; ?>" readonly/>
                                </div>
                                <div class="account-label-in">
                                    <div class="h3">Birth date:</div>
                                    <input class="in" maxlength="50" name="pass" id="log-password" size="25" type="date" value="<?php echo $row[11]; ?>" readonly/>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="account-label-in"><a href="edit-account.php">Edit profile &raquo;</a></div>
                    </div>

                    <h2>Notifications</h2>
                    <div class="notification-box"> 
                        <?php

                        include '../back-end/create-link.php';
                        $id = 0;
                        $role = 0;

                        if (isset($_SESSION['vol_id'])) {
                            $id = $_SESSION['vol_id'];
                        }
                        else {
                            $id = $_SESSION['org_id'];
                            $role = 1;
                        }

                        $query = "SELECT notifications.date, messages.text ,notifications.id,events.title,events.id FROM notifications, messages, events WHERE notifications.user_id='$id' AND notifications.role='$role' AND notifications.not_id = messages.id AND notifications.event_id = events.id ORDER BY notifications.id DESC";
                         $results = mysqli_query($link,$query);   
                        while ($row = mysqli_fetch_row($results)) { 
                        
                        ?>

                            <div class="notification"> 
                                <div class="image"> </div>
                                <div class="message">
                                    <?php echo $row[1]; ?>
                                </div> 
                                <?php if($row[4] != 0)  {?>
                                <div class="event-link">Event page: <a href="event.php?id=<?php echo $row[4]; ?>"> <?php echo $row[3]; ?></a> </div>
                                <?php } ?>
                                <div class="date">
                                    <?php echo $row[0]; ?>
                                </div> 
                            </div>

                           <?php } ?>
                    </div>

                    <?php if(!isset($_SESSION['org_id'])) { ?>
                        <div id="points">Overall points: 75</div>
                    <?php } ?>
                    
                    <div id="history">

                        <div id="tabbed_box_1" class="tabbed_box">

                            <?php if(isset($_SESSION['org_id'])) { ?>
                            <h2>Organization's event history</h2>
                            <div class="tabbed_area">

                                <ul class="tabs">
                                    <li><a href="#" title="content_1" class="tab active">Active events</a></li>
                                    <li><a href="#" title="content_2" class="tab">Completed events</a></li>
                                    <li><a href="#" title="content_3" class="tab">Canceled events</a></li>
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
                            <h2>Volunteer's history</h2>
                            <div class="tabbed_area">

                                <ul class="tabs">
                                    <li><a href="#" title="content_1" class="tab active">Completed events</a></li>
                                    <li><a href="#" title="content_2" class="tab">Events applied for</a></li>
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
                <?php } ?>
                    
                
                <div id="account-blanket">
                
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
    </body>
</html>