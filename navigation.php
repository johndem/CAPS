<?php
session_start();
$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';
    echo '<ul>';

if (strpos($url,'index') !== false OR trim($url) == "/CAPS/") {
    echo '<li id="selected"><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
    }
}
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false) || (strpos($url,'event') !== false)) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li  id="selected"><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';

    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
    }
}
else if (strpos($url,'organisations') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li  id="selected" ><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
    }
}
else if (strpos($url,'calendar') !== false) {
    echo '<li ><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li id="selected" ><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
    }
}
else if (strpos($url,'account') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li id="selected" ><a href="account.php">ACCOUNT</a></li>';
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
    }
}
else {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li><a href="account.php">ACCOUNT</a></li>';
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
    }
}

    echo '</ul>';
echo '</div>';

?>