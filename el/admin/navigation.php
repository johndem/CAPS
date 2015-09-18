<?php

$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';
    echo '<ul>';

if (strpos($url,'index') !== false) {
    echo '<li id="selected"><a href="index.php">ΧΡΗΣΤΕΣ</a>';
    echo '<li><a href="admin-events.php">ΔΡΑΣΕΙΣ</a></li>';
    echo '<li><a href="admin-data.php">ΔΕΔΟΜΕΝΑ</a></li>';
    echo '<li><a href="admin-news.php">ΝΕΑ</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';
}
else if ((strpos($url,'admin-events') !== false)) {
    echo '<li><a href="index.php">ΧΡΗΣΤΕΣ</a></li>';
    echo '<li id="selected"><a href="admin-events.php">ΔΡΑΣΕΙΣ</a></li>';
    echo '<li><a href="admin-data.php">ΔΕΔΟΜΕΝΑ</a></li>';
    echo '<li><a href="admin-news.php">ΝΕΑ</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';
}
else if (strpos($url,'admin-data') !== false) {
    echo '<li><a href="index.php">ΧΡΗΣΤΕΣ</a></li>';
    echo '<li><a href="admin-events.php">ΔΡΑΣΕΙΣ</a></li>';
    echo '<li id="selected"><a href="admin-data.php">ΔΕΔΟΜΕΝΑ</a></li>';
    echo '<li><a href="admin-news.php">ΝΕΑ</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';
}
else if (strpos($url,'admin-news') !== false) {
    echo '<li><a href="index.php">ΧΡΗΣΤΕΣ</a></li>';
    echo '<li><a href="admin-events.php">ΔΡΑΣΕΙΣ</a></li>';
    echo '<li><a href="admin-data.php">ΔΕΔΟΜΕΝΑ</a></li>';
    echo '<li id="selected"><a href="admin-news.php">ΝΕΑ</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';
}
else {
    echo '<li><a href="index.php">ΧΡΗΣΤΕΣ</a></li>';
    echo '<li><a href="admin-events.php">ΔΡΑΣΕΙΣ</a></li>';
    echo '<li><a href="admin-data.php">ΔΕΔΟΜΕΝΑ</a></li>';
    echo '<li><a href="admin-news.php">ΝΕΑ</a></li>';
    echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';
}

    echo '</ul>';
echo '</div>';

?>