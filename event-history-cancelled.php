<?php
    
include 'create-link.php';

$org_id = $_SESSION['org_id'];

$query = "SELECT * FROM events WHERE org_id = '$org_id' AND status = '-1' ORDER BY id desc";
$results = mysqli_query($link,$query);

while ($row = mysqli_fetch_row($results)) {
    echo '<div class="history-event">';
    echo '<h3>' . $row[2] . '</h3>';
    echo '<p>' . $row[12] . '</p>';
    $queryOrg = "SELECT name FROM organisations WHERE id = '$org_id'";
    $orgResults = mysqli_query($link,$queryOrg);
    $org = mysqli_fetch_row($orgResults);
    echo '<h5>Posted by: ' . $org[0] . '</h5>';
    echo '<h5>Category: ' . $row[3] . '</h5>';
    echo '<h5>Date: ' . $row[8] . '</h5>';
    echo '<h5>Area: ' . $row[7] . '</h5>';
    echo '<a href="event.php?id=' . $row[0] . '">Read more &raquo;</a>';
    echo '</div>';
}
    
@mysqli_close($link);

?>