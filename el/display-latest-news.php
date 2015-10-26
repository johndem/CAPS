<?php
    
include 'create-link.php';

mysqli_set_charset($link, "utf8");

$query = "SELECT * FROM news ORDER BY ID DESC limit 4";
$results = mysqli_query($link,$query);

while ($row = mysqli_fetch_row($results)) {
    echo '<div class="new"><img src=' . $row[3] . ' /><div class="new-text"><h3>' . $row[1] . '</h3><p>' . $row[2] . '</p><a href="news.php?id=' . $row[0] . '">Περισσότερα</a></div></div>';
}

echo '<div id="btnNews"><h3><a href="news-stories.php">Άλλα νέα</a></h3></div>';

@mysqli_close($link);

?>