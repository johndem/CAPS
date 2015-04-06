<?php
    
    include 'create-link.php';

    $query = "SELECT * FROM news";
    $results = mysqli_query($link,$query);


    while ($row = mysqli_fetch_row($results)) {
        echo '<div class="new"><img src=' . $row[3] . ' /><div class="new-text"><h3>' . $row[1] . '</h3><p>' . $row[2] . '</p><a href="">Read more</a></div></div>';
        echo '</br>';
    } 

    @mysqli_close($link);

?>