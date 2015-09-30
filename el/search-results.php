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

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            <h1 class="center-title"></h1>
            <div class="page-title"> 
                <div class="main-title">Αποτελέσματα Αναζήτησης</div>  
            </div>
            
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
 
            // pagination stuff
            if (!isset($_GET['pagenum'])) {
                $pagenum = 1;
            }
            else {
                $pagenum = $_GET['pagenum'];
            }  
            // end of pagination stuff

            $query = "SELECT * FROM events WHERE (category='$category' OR area='$area' OR agegroup= '$ages' OR skills = '$skills' OR day = '$date') AND status='1' ";
            
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
  	
            $query = "SELECT * FROM events WHERE (category='$category' OR area='$area' OR agegroup= '$ages' OR skills = '$skills' OR day = '$date') AND status='1' $max";
            $results = mysqli_query($link, $query);
            // end of pagination stuff

            if ($results) {   
                $bool = false;
                while ($row = mysqli_fetch_row($results)) { 
                    $bool = true;
                    $org_q = "SELECT name FROM organisations WHERE org_id = '$row[1]' ";
                    $org_res = mysqli_query($link,$org_q); 
                    $org_name = mysqli_fetch_row($org_res);     
            ?>
                
                <div class="single-result">
                    <h3><?php echo $row[2] ?></h3>
                    <p><?php echo $row[12] ?> </p>
                    <h5>Από: <?php echo $org_name[0] ?></h5>
                    <h5>Κατηγορία: <?php echo $row[3]  ?></h5>
                    <h5>Ημ/νία: <?php echo $row[8] ?> </h5>
                    <h5>Περιοχή: <?php echo $row[7] ?></h5>
                    <a href="<?php echo "event.php?id=" . $row[0]; ?>">Περισσότερα &raquo;</a>   
                </div> 
                 
            <?php } 
                
            if ($num_results != 0) {
                
                $url = "category=" . $category . "&areas=" . $areas . "&ages=" . $ages . "&skills=" . $skills . "&date=" . $date . "&";
                
                // ARROW STUFF
                echo '<div class="pagination">';
                if ($pagenum != 1) {
                    $previous_page = $pagenum - 1;
                    echo "<a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$previous_page'><img src='images/page-arrow-left.png' /></a>";
                }

                for ($i = 1; $i <= $last_page; $i++) {
                    if ($i == $pagenum)
                        echo "<div class='pagination-block' id='selected_page'><a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$i'>$i</a></div>";
                    else
                        echo "<div class='pagination-block'><a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$i'>$i</a></div>";
                }

                if ($pagenum != $last_page && $last_page != 1) {
                    $next_page = $pagenum + 1;
                    echo "<a href='{$_SERVER['PHP_SELF']}?" . $url . "pagenum=$next_page'><img src='images/page-arrow-right.png' /></a>";
                }
                echo '</div>';
                // END OF ARROW STUFF

                
            } 
  
            if ($bool== false) { ?>
                <div class="single-result">
                    <h3>Δεν υπάρχουν εθελοντικές δράσεις που ταιριάζουν στα κριτήριά σας!</h3> 
                </div> 
                <a href="volunteers.php">Πίσω</a>
            <?php }
            }
            else {
                echo '<p> Υπήρξε πρόβλημα κατά την ανάκτηση των αποτελεσμάτων από την βάση δεδομένων. Παρακαλούμε δοκιμάστε αργότερα!  </p>';
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