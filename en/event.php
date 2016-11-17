<!DOCTYPE html>


        <?php

        session_start();

        mysqli_set_charset($link, "utf8");

        include '../back-end/find-event.php';

        if (($row[17] == '0' || $row[17] == '-1') & !isset($_SESSION['admin'])) {
            header("Location: index.php");

        ?>

        <?php } else { ?>

          <html lang="el">
              <head>
                  <meta property="og:title" content="<?php echo $row[2]; ?>" />
                  <meta property="og:site_name" content="Vol4All"/>
                  <meta property="og:url" content=""/>
                  <meta property="og:description" content="<?php echo $row[12]; ?>" />
                  <meta property="fb:app_id" content="1647764365516493" />
                  <meta property="og:type" content="article" />
                  <meta property="article:author" content="vol4all" />
                  <meta property="article:publisher" content="vol4all" />
                  <meta property="og:image"  content="<?php echo "http://oswinds.csd.auth.gr/vol4all" . substr($row[14],2); ?>" />
                  <meta charset="utf-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                  <title>Vol4All</title>
                  <meta name="description" content="">
                  <link rel="stylesheet" href="../main.css">
                  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                  <script src="jq.js"></script>
                  <script src="apply.js"></script>
                  <script src="https://maps.googleapis.com/maps/api/js"></script>
              </head>
              <body>


        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1647764365516493',
                    xfbml      : true,
                    version    : 'v2.4'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            } (document, 'script', 'facebook-jssdk'));
        </script>

        <script type="text/javascript">
            function share () {
                FB.ui(
                {
                    method: 'share',
                    href: 'http://oswinds.csd.auth.gr/vol4all/en/event.php?id=<?php if (isset($_GET["id"])) {echo $_GET['id'];}?>',
                },
                // callback
                function(response) {
                    if (response && !response.error_code) {
                        alert('Posting completed.');
                    } else {
                        alert('Error while posting.');
                    }
                }
                );
            }
        </script>


        <!-- registration or username -->
        <?php //include 'log-state.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
        <!-- Trigger/Open The Modal -->

          <!-- The Modal -->
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">×</span>
              <div class="modal-header">
              <h2>Volunteering Application</h2>
            </div>
              <p>You chose to apply for this event. Please write a small paragraph as to why you are suitable for this event.</p>
              <p>The organization will review your application. If you get selected an email will be send to you. You can aslo check your profile page.</p>
              <p> Note: Leaving this empty will get you disqualified immediately!
              <textarea id="vol-input" cols="55" name="vol-input" maxlength="1000" rows="10" required></textarea>
              <input type="submit" class="submitBtn" id="vol-sub" name="submit" value="Submit" />
            </div>

          </div>
            <h1 class="center-title"></h1>
                <?php include '../back-end/check-org-event.php'; ?>
                <!-- <h1 class="center-title"><?php echo "$row[2]"; ?></h1> -->

                <?php

                if (isset($_SESSION['vol_id'])) {

                    include '../back-end/create-link.php';
                    $vol_id = $_SESSION['vol_id'];
                    $eventid = $_GET['id'];
                    $query = "SELECT id FROM apply WHERE eventID='$eventid' AND volunteerID = '$vol_id' AND selected = 1";
                    $results = mysqli_query($link,$query);

                    if (mysqli_num_rows($results) > 0) {

                ?>

                    <div class="selected-msg"> You have been selected as a volunteer for this event! </div>

                    <?php }
                } ?>


                <div class="page-title">
                    <div class="main-title"> <?php echo "$row[2]"; ?></div>
                    <h4>Event information</h4>
                </div>

                <div id="event-page">
                    <div id="event-main">
				        <h2>Details</h2>
                        <ul id="event-chars">
                            <li id="state-bul"><?php echo "<strong>Event state: </strong>"; if ($row[17]==1) echo '<span class="active_green">Active</span>';
                                                                            else if ($row[17]==2) echo '<span class="completed_red">Completed</span>';
                                                                            else if ($row[17]==0) echo '<span class="completed_red">Under evaluation</span>';
                                                                            else if ($row[17]==-1) echo '<span class="completed_red">CANCELLED</span>';?></li>
                            <li id="cat-bul"><?php echo "<strong>Category: </strong>" . $row[3]; ?></li>
                            <li id="ad-bul"><?php echo "<strong>Address:  </strong>" . $row[4] . " " . $row[5] . ", " . $row[7] . ", " . $row[6]; ?></li>
                            <li id="date-bul"><?php echo "<strong>Date:  </strong>" . $row[8] . ", " . $row[9]; ?></li>
                            <li id="age-bul"><?php echo "<strong>Age group:  </strong>" . $row[10]; ?></li>
                            <li id="skill-bul"><?php echo "<strong>Skills required:  </strong>"; ?>
                            <?php
                            $skill = mysqli_fetch_row($skills);
                            echo $skill[0];

                            while ($skill = mysqli_fetch_row($skills)) {
                                 echo  ",  " . $skill[0];
                            }
                            @mysqli_close($link);

                            ?>
                            </li>

                            <?php $location = array("$row[4]", "$row[5]", "$row[7]", "$row[6]", "Thessaloniki"); ?>
                        </ul>
				        <div><h2>Description</h3></div>
                        <div id="event-body"><?php echo nl2br($row[13]); ?></div>

                        <div id="event-gallery">
                        <?php

                        if ($row[14] != '' && $row[15] != '') {
                            echo '<div id="carousel">';
                                echo '<ul>';
                                    echo '<li><img src="' . $row[14] . '" /></li>';
                                    echo '<li><img src="' . $row[15] . '" /></li>';
                                    if ($row[16] != '')
                                        echo '<li><img src="' . $row[16] . '" /></li>';
                                echo '</ul>';
                            echo '</div>';
                        }
                        else if ($row[14] != '') {
                            echo '<img src="' . $row[14] . '" />';
                        }

                        ?>
                        </div>

                        <h2>Where you can find us</h2>
                        <div id="map-canvas"></div>

                    </div>
                    <div id="event-side">

                        <?php

                        include '../back-end/create-link.php';
                        $eid = $_GET['id'];
                        $vid = $_SESSION['vol_id'];

                        $query = "SELECT id FROM apply WHERE eventID = '$eid' AND volunteerID = '$vid' ";

                        $result = mysqli_query($link,$query);
                        @mysqli_close($link);

                        $applied = false;
                        if (mysqli_num_rows($result) >= 1) {
                            $applied= true;
                        }

                        ?>

                        <?php if($row[17] == 2) { ?>
                        <div id="btnApply" class="btnGreyout">
                            COMPLETED
                        </div>
                        <?php } elseif(isset($_SESSION['vol_id']) AND $applied == false) { ?>
                        <div id="btnApply" onclick="volApply()">
                            APPLY
                        </div>

                        <?php
                        }elseif(isset($_SESSION['vol_id']) AND $applied) { ?>
                        <div id='btnCancel' onclick="cancel()">
                            CANCEL
                        </div>
                        <div id="msgApply">* You have applied for this event. Click CANCEL to delete your application</div>

                        <?php } else {

                        if ($flag == true) { ?>

                        <div id="btnApply" onclick="window.location='complete-event.php?eventid=<?php echo $eventid; ?>'">
                            COMPLITION
                        </div>
                        <div id="msgApply">*
                            <a href="register.php">Click here afte the completion of the event.
                        </div>

                        <?php } else { ?>

                        <div id="btnApply" class="btnGreyout">
                            APPLY
                        </div>
                        <div id="msgApply">*
                            <a href="register.php">Register</a> or <a href="login.php">login</a> with a volunteer's account to apply for this event
                        </div>

                        <?php } } ?>



                        <div id="org-side">
                            <img src="<?php echo $org[10]; ?>" />
                            <div id="org-info">
                                <h3>Organization's name:</h3>
                                <?php echo '<h5><a href="organization.php?id=' . $org[0] . '">' . $org[4] . '</a></h5>'; ?>
                                <h3>Contact info:</h3>
                                <?php echo '<h5>' . $org[2] . '</h5>'; ?>
                                <?php
                                if ($org[5] != "") {
                                    echo '<h3><a href="' . $org[5] . '">Visit website</a></h3>';
                                }
                                if ($org[6] != "") {
                                    echo '<h3><a href="' . $org[6] . '">Like us on Facebook</a></h3>';
                                }
                                if ($org[7] != "") {
                                    echo '<h3><a href="' . $org[7] . '">Follow us on Twitter</a></h3>';
                                }
                                if ($org[8] != "") {
                                    echo '<h3><a href="' . $org[8] . '">Other</a></h3>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="facebook-share" onclick="share()">Share on Facebook</div>
                        <?php

                        if ($flag == true) { ?>

                            <h3 style="text-align: center;">Applicants</h3>
                            <div class="applied-content">
                            <?php

                            include '../back-end/create-link.php';
                            $eventid = $_GET['id'];
                            mysqli_set_charset($link, "utf8");
                            $query = "SELECT user.firstname, user.lastname, user.username FROM user,apply WHERE user.id = apply.volunteerID AND apply.eventID = $eventid ";
                            $result = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_row($result)) { ?>

                            <div class="applicant">

                                <?php echo $row[0] . " " . $row[1] . " (" . $row[2] . ")";

                            ?>

                            </div>

                            <?php
                            }
                            @mysqli_close($link);
                            ?>

                            </div>

                            <div class="approve-btn" onclick="window.location='approve.php?eventid=<?php echo $eventid; ?>'">Select</div>

                        <?php } ?>


                    </div>

                </div>

                <div id="event-blanket">

                </div>

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>


        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(40.5831119, 22.95191360000001),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions);

                var geocoder = new google.maps.Geocoder();
                var address = <?php echo json_encode($location); ?>;
                address = address.toString();
                //alert(address);

                geocoder.geocode( { 'address': address}, function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        //alert(latitude);

                        var myLatlng = new google.maps.LatLng(latitude,longitude);
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
                            title:"Volunteering Event"
                        });
                    }
                });


            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


        <?php } ?>

    </body>
</html>
