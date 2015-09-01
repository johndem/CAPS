<?php

include 'create-link.php';

$query = "SELECT id,firstname,lastname,picture,points FROM user ORDER BY points desc LIMIT 10";
$results = mysqli_query($link,$query);

if (mysqli_num_rows($results) > 0) {
    
    $position = 1;
    echo '<table cellspacing="0" id="leaderboard-table">';
    
    while ($row = mysqli_fetch_row($results)) {
        if ($row[4] != 0) {
            echo '<tr>';
            echo '<td>' . $position . '</td>';
            echo '<td><img src="' .  $row[3] . '" width="100" height="100" /></td>';
            echo '<td>' . $row[1] . ' ' . $row[2] . '</td>';
            echo '<td>' . $row[4] . ' pts' . '</td>';
            echo '</tr>';
        }
        $position++;
    }
    
    echo '</table>';
}


@mysqli_close($link);

?>