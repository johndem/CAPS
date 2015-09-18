<?php

$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';
    echo '<ul>';

if (strpos($url,'index') !== false) {
    echo '<li id="selected"><a href="index.php">USERS</a>';
    echo '<li><a href="admin-events.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="admin-news.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if ((strpos($url,'admin-events') !== false)) {
    echo '<li><a href="index.php">USERS</a></li>';
    echo '<li id="selected"><a href="admin-events.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="admin-news.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if (strpos($url,'admin-data') !== false) {
    echo '<li><a href="index.php">USERS</a></li>';
    echo '<li><a href="admin-events.php">EVENTS</a></li>';
    echo '<li id="selected"><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="admin-news.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else if (strpos($url,'admin-news') !== false) {
    echo '<li><a href="index.php">USERS</a></li>';
    echo '<li><a href="admin-events.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li id="selected"><a href="admin-news.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}
else {
    echo '<li><a href="index.php">USERS</a></li>';
    echo '<li><a href="admin-events.php">EVENTS</a></li>';
    echo '<li><a href="admin-data.php">DATA</a></li>';
    echo '<li><a href="admin-news.php">NEWS</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
}

    echo '</ul>';
echo '</div>';

?>