<?php
    
    include 'create-link.php';

    $query = "SELECT * FROM news ORDER BY ID DESC limit 4";
    $results = mysqli_query($link,$query);


    while ($row = mysqli_fetch_row($results)) {
        echo '<div class="new"><img src=' . $row[3] . ' /><div class="new-text"><h3>' . $row[1] . '</h3><p>' . $row[2] . '</p><a href="news.php?id=' . $row[0] . '">Read more</a></div></div>';
    }

    echo '<div id="btnNews"><h3><a href="news-stories.php">Περισσότερα</a></h3></div>';

    @mysqli_close($link);
?>