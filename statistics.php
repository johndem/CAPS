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
        <script src="https://maps.googleapis.com/maps/api/js"></script>
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
            <div class="page-title"> 
                <div class="main-title">Statistics</div>  
                <h4>Volunteering statistics and leaderboard</h4>
            </div>
            
            <?php

            if (isset($_GET["fromdate"]) && isset($_GET["todate"])) {
                $fromdate = $_GET["fromdate"];
                $fromstrings = explode('-',$fromdate);
                $todate = $_GET["todate"];
                $tostrings = explode('-',$todate);
      
                include 'create-link.php';
                $query="SELECT * FROM events WHERE YEAR(day) >= '$fromstrings[0]' AND YEAR(day) <= '$tostrings[0]' AND MONTH(day) >= '$fromstrings[1]' AND MONTH(day) <= '$tostrings[1]'";
                $results = mysqli_query($link,$query);
                
                $locations = array();
                if (mysqli_num_rows($results) > 0) {
                    while ($row = mysqli_fetch_row($results)) {
                        $location = array("$row[4]", "$row[5]", "$row[7]", "$row[6]", "ΘΕΣΣΑΛΟΝΙΚΗΣ");
                        array_push($locations, $location);
                    }
                }
            }


            ?>
            
                
                
            <div id="statistics">
                
                <div id="stats">
                    
                    <div id="stats-map"></div>
                    
                    <div id="stats-options">
                        <h2>Pick duration in months</h2>
                        <form method="get" action="">
                            <div class="month-picker">
                                <div>From:</div>
                                <input type="month" name="fromdate">
                            </div>
                            <div class="month-picker">
                                <div>To:</div>
                                <input type="month" name="todate">
                            </div>
                            <div id="go">
                                <input type="submit" class="submitBtn" id="sButton" name="submit" value="Display" />
                            </div>
                        </form>
                        
                    </div>
                     
                </div>   
                    
            </div>
                    
                
            <div id="account-blanket">

            </div>
                
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>
        
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('stats-map');
                var mapOptions = {
                    center: new google.maps.LatLng(40.6320457, 22.941188600000032),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions);
                
                var geocoder = new google.maps.Geocoder();
                
                
                    
                var js_var = JSON.parse('<?php echo json_encode($locations); ?>');

                
                for (var i = 0; i < js_var.length; i++) {
                
                    address = js_var[i];
                    address = address.toString();
                    //alert(address);

                    geocoder.geocode( { 'address': address}, function(results, status) {

                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            //alert(address + " " + latitude);

                            var myLatlng = new google.maps.LatLng(latitude,longitude);
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title:"Volunteering Event"
                            });
                        } 
                    }); 
                
                }
                
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
            
       
    </body>
    
   
</html>