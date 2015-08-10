<!DOCTYPE html>
<html>

    <head>
    <meta property="og:title" content="Share this event!" />
    <meta property="og:site_name" content="Thessaloniki Volunteer Network"/>
    <meta property="og:url" content="http://localhost/CAPS/index.php"/>
    <meta property="og:description" content="The Volunteer netowrk of Thessaloniki is a place where you can easily find volunteering oppurtunities." />
    <meta property="fb:app_id" content="1607915839446072" />
    <meta property="og:type" content="article" />
    <meta property="article:author" content="TVN" />
    <meta property="article:publisher" content="TVN" />
    <meta property="og:image"  content="https://www.facebook.com/images/fb_icon_325x325.png" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
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
          appId      : '1607915839446072',
          xfbml      : true,
          version    : 'v2.4'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <script type="text/javascript">
  function share () {

    FB.ui(
  {
    method: 'share',
    href: 'http://localhost/CAPS/event.php?id=22',
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
            <h1 class="center-title"></h1>
                <?php include 'find-event.php'; ?>
                <!-- <h1 class="center-title"><?php echo "$row[2]"; ?></h1> -->
                <div class="page-title"> 
                    <div class="main-title"> <?php echo "$row[2]"; ?></div>  
                    <h4>Event information page</h4>
                    </div>
                <div id="event-page">
                    
                    
                    <div id="event-main">
				  <h2>Details</h2>
                        <ul id="event-chars">
                            <li><?php echo "<strong>Category: </strong>" . $row[3]; ?></li>
                            <li><?php echo "<strong>Address:  </strong>" . $row[4] . " " . $row[5] . ", " . $row[7] . ", " . $row[6]; ?></li>
                            <li><?php echo "<strong>Date:  </strong>" . $row[8] . ", " . $row[9]; ?></li>
                            <li><?php echo "<strong>Recommended age group:  </strong>" . $row[10]; ?></li>
                            <li><?php echo "<strong>Optional skills:  </strong>" . $skills[2]; ?></li>
                            <?php $location = array("$row[4]", "$row[5]", "$row[7]", "$row[6]", "ΘΕΣΣΑΛΟΝΙΚΗΣ"); ?>
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
                        
                        <h2>Where to find us</h2>
                        <div id="map-canvas"></div>

                    </div>
                    <div id="event-side">
                        
                        <?php 

                        include 'create-link.php';
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

                        <?php if(isset($_SESSION['vol_id']) AND $applied == false) { ?>
                        <div id="btnApply" onclick="volApply()">
                            APPLY
                        </div>
                        <?php 
                        }elseif(isset($_SESSION['vol_id']) AND $applied) { ?>
                        <div id='btnCancel' onclick="cancel()">
                            CANCEL
                        </div>
                        <div id="msgApply">* You have applied for this event! Click CANCEL to remove.</div>

                        <?php } else { ?>
                        
                        <div id="btnApply" class="btnGreyout">
                            APPLY
                        </div>
                        <div id="msgApply">* 
<a href="register.php">Sign up</a> or <a href="login.php">log in</a> with a volunteer account to apply!</div>
                        <?php } ?>
                        
                        
                        
                        <div id="org-side">
                            <img src="<?php echo $org[10]; ?>" />
                            <div id="org-info">
                                <h3>Organisation name:</h3>
                                <?php echo '<h5><a href="organization.php?id=' . $org[0] . '">' . $org[4] . '</a></h5>'; ?>
                                <h3>Contact:</h3>
                                <?php echo '<h5>' . $org[2] . '</h5>'; ?>
                                <?php 
                                    if ($org[5] != "") {
                                        echo '<h3><a href="' . $org[5] . '">Visit our Website</a></h3>';
                                    }
                                    if ($org[6] != "") {
                                        echo '<h3><a href="' . $org[6] . '">Find us on Facebook</a></h3>';
                                    }
                                    if ($org[7] != "") {
                                        echo '<h3><a href="' . $org[7] . '">Find us on Twitter</a></h3>';
                                    }
                                    if ($org[8] != "") {
                                        echo '<h3><a href="' . $org[8] . '">Other</a></h3>';
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="facebook-share" onclick="share()">Share on Facebook</div>
                         <?php 

                        include 'check-org-event.php';

                        if ($flag == true) { ?>

                           <h3 style="text-align: center;"> Users applied for this event: </h3>
                           <div class="applied-content"> 
                            <?php 

                                include 'create-link.php';
                                $eventid = $_GET['id'];

                                $query = "SELECT user.firstname, user.lastname, user.username FROM user,apply WHERE user.id = apply.volunteerID AND apply.eventID = $eventid ";
                                $result = mysqli_query($link,$query);

                                while ($row = mysqli_fetch_row($result)) { ?>

                                <div class="applicant"> 

                                    <?php echo $row[0] . " " . $row[1] . " (" . $row[2] . ")";  ?>

                                </div>

                          <?php      }
                          @mysqli_close($link);
                            ?>
                            
                           </div>

                       <?php }
                        ?>

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
                var address = <?php echo json_encode($location, JSON_UNESCAPED_UNICODE); ?>;
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
        
    </body>
</html>