<?php
    include 'create-link.php';

    // pagination stuff
    if (!isset($_GET['pagenum'])) {
        $pagenum = 1;
    }
    else {
        $pagenum = $_GET['pagenum'];
    }  
    // end of pagination stuff

    $query = "SELECT * FROM news";
    $results = mysqli_query($link,$query);

    // pagination stuff
    $num_results = mysqli_num_rows($results);

    $page_rows = 5;
    $last_page = ceil($num_results/$page_rows);

    if ($pagenum < 1) {
        $pagenum = 1;
    }
    else if ($pagenum > $last_page) {
        $pagenum = $last_page;
    }

    $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;

    $query = "SELECT * FROM news ORDER BY ID DESC $max";
    $results = mysqli_query($link,$query);
    // end of pagination stuff

    while ($row = mysqli_fetch_row($results)) {
        echo '<div class="new-long"><img src=' . $row[3] . ' /><div class="new-text"><h3>' . $row[1] . '</h3><p>' . $row[2] . '</p><a href="news.php?id=' . $row[0] . '">Read more</a></div></div>';

    }

    if ($num_results != 0) {

        // ARROW STUFF
        echo '<div class="pagination">';
        if ($pagenum != 1) {
            $previous_page = $pagenum - 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=$previous_page'><img src='images/page-arrow-left.png' /></a>";
        }

        for ($i = 1; $i <= $last_page; $i++) {
            if ($i == $pagenum)
                echo "<div class='pagination-block' id='selected_page'><a href='{$_SERVER['PHP_SELF']}?pagenum=$i'>$i</a></div>";
            else
                echo "<div class='pagination-block'><a href='{$_SERVER['PHP_SELF']}?pagenum=$i'>$i</a></div>";
        }

        if ($pagenum != $last_page && $last_page != 1) {
            $next_page = $pagenum + 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=$next_page'><img src='images/page-arrow-right.png' /></a>";
        }
        echo '</div>';
        // END OF ARROW STUFF

    } 


?>