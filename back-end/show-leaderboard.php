<?php

include 'create-link.php';

mysqli_set_charset($link, "utf8");

$query = "SELECT id,firstname,lastname,picture,points FROM user ORDER BY points desc LIMIT 10";
$results = mysqli_query($link,$query);

if (mysqli_num_rows($results) > 0) {
    
    $position = 1;
    echo '<table cellspacing="0" id="leaderboard-table">';
    
    while ($row = mysqli_fetch_row($results)) {
        if ($row[4] != 0) {
            echo '<tr>';
            echo '<td style="width: 15%;"><h3>' . $position . '.</h3></td>';
            echo '<td style="width: 25%;"><img src="' .  $row[3] . '" width="100" height="100" /></td>';
            echo '<td style="width: 40%;"><h3>' . $row[1] . ' ' . $row[2] . '</h3></td>';
            echo '<td style="width: 20%;"><h3>' . $row[4] . ' pts' . '</h3></td>';
            echo '</tr>';
        }
        $position++;
    }
    
    echo '</table>';
}


@mysqli_close($link);

?>