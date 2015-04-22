<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Team Thessaloniki</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>

        
        <!-- registration or username -->
		<?php include 'log-state.php'; ?>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>

        <!-- content -->
        <div class="content">
            
            <h1 class="center-title">Search results</h1>
            
            <?php 
            
                include 'create-link.php';

                $category = $_GET['category'];
                $area = $_GET['areas'];
                $ages = $_GET['ages'];
                $skills = $_GET['skills'];
                $date = $_GET['date'];
                
                echo $category . $area . $skills . $date;
                
                $query = "SELECT * FROM events WHERE category='$category' OR area='$area' OR agegroup= '$ages' OR skills = '$skills' OR day = '$date' ";

                $results = mysqli_query($link,$query);


            if ($results) {   
                
                    while ($row = mysqli_fetch_row($results)) {
                        echo '<p> ' . $row[2] . '</p>';
                    } 
                    echo "results!";
              
            }
            else {
    
                echo "database prob";
            } 
               
                mysqli_close($link); 
            
            ?>
            
            <div id="home-blanket">

            </div>

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>

        
    </body>

</html>