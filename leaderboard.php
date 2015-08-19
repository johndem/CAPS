<?php

include 'create-link.php';

$query = "SELECT id,firstname,lastname,picture,points FROM user ORDER BY points desc LIMIT 10";
$results = mysqli_query($link,$query);

if (mysqli_num_rows($results) > 0) {
    echo '<div>';
    echo '<ul>';
    $position = 1;
    while ($row = mysqli_fetch_row($results)) {
        if ($row[4] != 0)
            echo '<li>' . $position . " " . $row[1] . " " . $row[2] . " " . $row[4] . '</li>';
        $position++;
    }
    echo '</ul>';
    echo '</div>';
}


@mysqli_close($link);

?>