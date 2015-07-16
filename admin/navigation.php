<?php

$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';
    echo '<ul>';

if (strpos($url,'index') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="organisations.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li><a href="account.php"></a></li>';
}
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false) || (strpos($url,'event') !== false)) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li id="selected"><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
}
else if (strpos($url,'organisations') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li id="selected"><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
}
else if (strpos($url,'calendar') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li id="selected"><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
}
else if (strpos($url,'account') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li id="selected"><a href="account.php">ACCOUNT</a></li>';
}
else {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
}

    echo '</ul>';
echo '</div>';

?>