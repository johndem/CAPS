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
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                <h4>Platform progress and completed volunteering activities</h4>
            </div>
            
            <?php

            mysqli_set_charset($link, "utf8");
            include '../back-end/create-link.php';

            if (isset($_GET["fromdate"]) && isset($_GET["todate"])) {
                $fromdate = $_GET["fromdate"];
                $fromstrings = explode('-',$fromdate);
                $todate = $_GET["todate"];
                $tostrings = explode('-',$todate);
                
                $query="SELECT * FROM events WHERE YEAR(day) >= '$fromstrings[0]' AND YEAR(day) <= '$tostrings[0]' AND MONTH(day) >= '$fromstrings[1]' AND MONTH(day) <= '$tostrings[1]' AND status=2";
                $results = mysqli_query($link,$query); 
            }
            else {
                $query="SELECT * FROM events WHERE status=2";
                $results = mysqli_query($link,$query);
            }

            $locations = array();
            if (mysqli_num_rows($results) > 0) {
                while ($row = mysqli_fetch_row($results)) {

                    $location = array("$row[4]", "$row[5]", "$row[7]", "$row[6]", "Thessaloniki");
                    array_push($locations, $location);
                }
            }

            ?>
               
            <div id="statistics">
                
                <div id="numberstats">
                    <?php  
                    $query="SELECT * FROM user";
                    $result = mysqli_query($link,$query);
                    ?>
                    <h3>Number of registered volunteers: <?php echo mysqli_num_rows($result); ?></h3>
                    <?php  
                    $query="SELECT * FROM organisations";
                    $result = mysqli_query($link,$query);
                    ?>
                    <h3>Number of registered organizations: <?php echo mysqli_num_rows($result); ?></h3>
                    <?php  
                    $query="SELECT * FROM events WHERE status=2";
                    $result = mysqli_query($link,$query);
                    ?>
                    <h3>Number of completed volunteering events: <?php echo mysqli_num_rows($result); ?></h3>
                </div>
                
                <div id="mapstats">
                    <h4 class="left">Visual representation of successfully completed volunteering endeavors so far</h4>
                    
                    <div id="mapstats-map"></div>
                    
                    <div id="mapstats-options">
                        <h4>Display completed volunteering events in a time period:</h4>
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
                
                <div id="prefstats">
                    
                    <?php  
                    $query="SELECT title FROM categories";
                    $result = mysqli_query($link,$query);
                    $categories = array();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_row($result)) {
                            array_push($categories, $row[0]);
                        }
                    }

                    $cat_indicators = array_fill_keys($categories, 0);
                    $query="SELECT category FROM events WHERE status=2";
                    $results = mysqli_query($link,$query);
                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_row($results)) {
                            $cat_indicators[$row[0]]++;
                        }
                    }
                    ?>
                    
                    <h4 class="left">Volunteering category preferences</h4>
                    <div id="piechart_3d"></div>
                </div>
                    
            </div>
                    
                
            <div id="account-blanket">

            </div>
                
        </div>
            
        <!-- footer -->
        <?php include 'footer.php'; ?>
        
        <script>

            function initialize() {
                var mapCanvas = document.getElementById('mapstats-map');
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
                    

                    geocoder.geocode( { 'address': address}, function(results, status) {

                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            //alert(address + " " + latitude);

                            var myLatlng = new google.maps.LatLng(latitude,longitude);
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title:"Volunteering event"
                            });
                        } 
                    }); 
                
                }
                
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var pieInput = [['Category', 'Completed volunteering events']];
                var js_var = <?php echo json_encode($cat_indicators) ?>;
                $.each(js_var, function(key, value) {
                    var temp_array = [];
                    temp_array.push(key);
                    temp_array.push(value);
                    pieInput.push(temp_array);
                });
                //alert(pieInput.toString());
                var data = google.visualization.arrayToDataTable(pieInput);

                var options = {
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
            
    </body>
</html>