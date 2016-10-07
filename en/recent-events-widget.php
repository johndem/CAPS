<?php 
	
include '../back-end/create-link.php';

mysqli_set_charset($link, "utf8");

$query = "SELECT id,title,category,area,image FROM events WHERE status = '1' AND image<>'' ORDER BY RAND() LIMIT 2";
$results = mysqli_query($link,$query);

if (mysqli_num_rows($results) > 0) {
    echo '<div class="recent-events"> ';
    echo '<h4>Events that might interest you!</h4>';

    while ($row = mysqli_fetch_row($results)) {
        echo '<div class="event-info" onclick="window.location = '. "'event.php?id=$row[0]'" . '">'   ;
        echo '<div class="wid-image" style="background-image: url(' . "'" . $row[4] . "'" .  ');">';
        echo '</div>';
        echo '<div class="events-wid-title">' . $row[1] . '</div>';
        echo '<span><strong>Category:</strong> ' . $row[2] . '</span>';
        echo '<span><strong>Location: </strong>' . $row[3] .'</span>';
        echo '</div>';
    }

    echo '</div>';
}
	
?>