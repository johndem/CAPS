<?php
    
include 'create-link.php';

$volunteer_id = $_SESSION['vol_id'];

$query = "SELECT event_id FROM participation WHERE volunteer_id = '$volunteer_id'";
$results = mysqli_query($link,$query);
$num_results = mysqli_num_rows($results);

while ($row = mysqli_fetch_row($results)) {
    $query = "SELECT * FROM events WHERE id = '$row[0]'";
    $eventResults = mysqli_query($link,$query);
    $event = mysqli_fetch_row($eventResults);
    
    echo '<div class="history-event">';
    echo '<h3>' . $event[2] . '</h3>';
    echo '<p>' . $event[12] . '</p>';
    $queryOrg = "SELECT name FROM organisations WHERE org_id = '$event[1]'";
    $orgResults = mysqli_query($link,$queryOrg);
    $org = mysqli_fetch_row($orgResults);
    echo '<h5>Από: ' . $org[0] . '</h5>';
    echo '<h5>Κατηγορία: ' . $event[3] . '</h5>';
    echo '<h5>Ημ/νία: ' . $event[8] . '</h5>';
    echo '<h5>Περιοχή: ' . $event[7] . '</h5>';
    echo '<div class="history-event-links">';
    echo '<a href="event.php?id=' . $event[0] . '">Περισσότερα &raquo;</a>';
    echo '</div>';
    echo '</div>';
}
    
@mysqli_close($link);

?>