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
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">EVENT MAP STATS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile</a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout</a></li>';

        include 'create-link.php';
        $id = 0;
        $role = 0;

        if (isset($_SESSION['vol_id'])) {
            $id = $_SESSION['vol_id'];
        }
        else {
            $id = $_SESSION['org_id'];
            $role = 1;
        }

        //$query = "SELECT id FROM notifications WHERE read=0 AND user_id='$id'";

        if ($results = mysqli_query($link,"SELECT id FROM notifications WHERE ok=0 AND user_id='$id' AND role='$role'")) {

        $row_cnt = mysqli_num_rows($results);

        if ($row_cnt > 0) {
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' new notifications</a></li>';
        }
            

        }
       
       

    }
}
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false) || (strpos($url,'event') !== false)) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li  id="selected"><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">Event map stats</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </li>';

    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';

    }
}
else if (strpos($url,'organisations') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li  id="selected" ><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">Event map stats</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';

    }
}
else if (strpos($url,'calendar') !== false) {
    echo '<li ><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li id="selected" ><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">Event map stats</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';

    }
}
else if (strpos($url,'statistics') !== false || strpos($url,'leaderboard') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li id="selected">
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">Event map stats</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';

    }
}
else {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li><a href="organisations.php">ORGANISATIONS</a></li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">Event map stats</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Logged in as: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Profile </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Logout </a></li>';

    }
}

    echo '</ul>';
echo '</div>';

?>