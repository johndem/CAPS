<?php

$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';
    echo '<ul>';

if (strpos($url,'index') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a>'; ?>
    <?php echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false) || (strpos($url,'event') !== false)) {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if (strpos($url,'organisations') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if (strpos($url,'calendar') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if (strpos($url,'account') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else {
    echo '<li id="selected"><a href="index.php">USERS</a></li>';
    echo '<li><a href="volunteers.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="calendar.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}

    echo '</ul>';
echo '</div>';

?>