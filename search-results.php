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
            
            <div class="results">
            
            <?php 
            
            include 'create-link.php';

            $category = mysqli_real_escape_string($link,$_GET['category']);
            $category = htmlspecialchars($category,ENT_QUOTES);

            $area = mysqli_real_escape_string($link,$_GET['areas']);
            $area = htmlspecialchars($area,ENT_QUOTES);

            $ages = mysqli_real_escape_string($link,$_GET['ages']);
            $ages = htmlspecialchars($ages,ENT_QUOTES);

            $skills = mysqli_real_escape_string($link,$_GET['skills']);
            $skills = htmlspecialchars($skills,ENT_QUOTES);


            $date = mysqli_real_escape_string($link,$_GET['date']);
            $date = htmlspecialchars($date,ENT_QUOTES);

            //echo $category . $area . $skills . $date;
                
            // pagination stuff
            if (!isset($_GET['pagenum'])) {
                $pagenum = 1;
            }
            else {
                $pagenum = $_GET['pagenum'];
            }  
            // end of pagination stuff

            $query = "SELECT * FROM events WHERE category='$category' OR area='$area' OR agegroup= '$ages' OR skills = '$skills' OR day = '$date' ";
            
            $results = mysqli_query($link,$query);

            // pagination stuff
            $num_results = mysqli_num_rows($results);
  	
            $page_rows = 4;
            $last_page = ceil($num_results/$page_rows);

            if ($pagenum < 1) {
                $pagenum = 1;
            }
            else if ($pagenum > $last_page) {
                $pagenum = $last_page;
            }

            $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;
  	
            $query = "SELECT * FROM events WHERE category='$category' OR area='$area' OR agegroup= '$ages' OR skills = '$skills' OR day = '$date' $max";
            $results = mysqli_query($link, $query);
            // end of pagination stuff

            if ($results) {   
            
            
            $bool = true;
            while ($row = mysqli_fetch_row($results)) { 
                $bool = false;
                $org_q = "SELECT name FROM organisations WHERE org_id = '$row[1]' ";
                $org_res = mysqli_query($link,$org_q); 
                $org_name = mysqli_fetch_row($org_res);
            ?>
                
            <div class="single-result">
            <h3><?php echo $row[2] ?></h3>
            <p><?php echo $row[12] ?> </p>
            
            <h5>Posted by: <?php echo $org_name[0] ?></h5>
            <h5>Category: <?php echo $row[3]  ?></h5>
            <h5>Date: <?php echo $row[8] ?> </h5>
            <h5>Area: <?php echo $row[7] ?></h5>
            
            
            <a href="<?php echo "event.php?id=" . $row[0]; ?>">Read more &raquo;</a>
                
            </div> 
                 
            <?php    } 
                
            if ($num_results != 0) {
                echo "<p> Page $pagenum of $last_page </p>";
                
                $url = "category=" . $category . "&areas=" . $areas . "&ages=" . $ages . "&skills=" . $skills . "&date=" . $date . "&";
                
                if ($pagenum == 1 || $num_results == 0) { }
                else { // if not at first page of comments section, display First and Previous hyperlinks
                    echo " <a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=1'> <<-First</a> ";
                    echo " ";
                    $previous = $pagenum-1;
                    echo " <a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$previous'> <-Previous</a> ";
                }	

                if ($pagenum == $last_page) {}
                else { // if not at last page of comments section, display Next and Last hyperlinks
                    if ($num_results > 2*$page_rows) {
                        echo " ---- ";
                    }
                    $next = $pagenum+1;
                    echo " <a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$next'>Next -></a> ";
                    echo " ";
                    echo " <a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$last_page'>Last ->></a> ";
                }
                
            } 
  
            if ($bool) { ?>
            <div class="single-result">
            
                <h3>There are no volunteering events matching your criteria!</h3>
                
            </div> 
            <a href="volunteers.php">Go back</a>
            <?php   }
            }
            else {
    
                echo '<p> An error occurred while retrieving the results from the database. Please try again later!  </p>';
            } 
               
                mysqli_close($link); 
            
            ?> 
                
                
            </div>    
                
            
            <div id="home-blanket">

            </div>

      
        </div>
        <!-- footer -->
        <?php include 'footer.php'; ?>

        
    </body>

</html>