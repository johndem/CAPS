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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="jq.js"></script>
		<script src="form-check-add-event.js"></script>
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
            <!-- <h1 class="center-title">Register your organisation and get started!</h1> -->
            <div class="page-title"> 
                <div class="main-title"> Organizations that offer volunteering opportunities</div>  
                <h4> Register your organization and get started! </h4>
            </div>

            <div id="org-tab-default"> 

                <?php
                echo '<div class="side-widgets">';
                include 'recent-events-widget.php'; 
                include 'quick-search-widget.php';
                echo '</div>';
                ?>

                <div id="present-orgs">

                    <?php
                    include '../back-end/create-link.php';

                    mysqli_set_charset($link, "utf8");

                    // pagination stuff
                    if (!isset($_GET['pagenum'])) {
                        $pagenum = 1;
                    }
                    else {
                        $pagenum = $_GET['pagenum'];
                    }  
                    // end of pagination stuff

                    $query = "SELECT * FROM organisations";
                    $results = mysqli_query($link,$query);

                    // pagination stuff
                    $num_results = mysqli_num_rows($results);

                    $page_rows = 9;
                    $last_page = ceil($num_results/$page_rows);

                    if ($pagenum < 1) {
                        $pagenum = 1;
                    }
                    else if ($pagenum > $last_page) {
                        $pagenum = $last_page;
                    }

                    $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;

                    $query = "SELECT * FROM organisations $max";
                    $results = mysqli_query($link,$query);
                    // end of pagination stuff

                    while ($row = mysqli_fetch_row($results)) {
                        echo '<div class="single-org">';
                        echo '<img src="' . $row[10] . '" width="170" height="170" />';
                        echo '<h3><a href="organization.php?id=' . $row[0] . '">' . $row[4] . '</a></h3>';
                        echo '</div>';

                    }

                    if ($num_results != 0) {

                        // ARROW STUFF
                        echo '<div class="pagination">';
                        if ($pagenum != 1) {
                            $previous_page = $pagenum - 1;
                            echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=$previous_page'><img src='../images/other/page-arrow-left.png' /></a>";
                        }

                        for ($i = 1; $i <= $last_page; $i++) {
                            if ($i == $pagenum)
                                echo "<div class='pagination-block' id='selected_page'><a href='{$_SERVER['PHP_SELF']}?pagenum=$i'>$i</a></div>";
                            else
                                echo "<div class='pagination-block'><a href='{$_SERVER['PHP_SELF']}?pagenum=$i'>$i</a></div>";
                        }

                        if ($pagenum != $last_page && $last_page != 1) {
                            $next_page = $pagenum + 1;
                            echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=$next_page'><img src='../images/other/page-arrow-right.png' /></a>";
                        }
                        echo '</div>';
                        // END OF ARROW STUFF

                    } 

                    ?>
                </div>

            </div>
  
        </div>

        <div id="reg-blanket">

        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>
       
    </body>
</html>