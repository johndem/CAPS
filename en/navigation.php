<?php

session_start();
$url = $_SERVER["REQUEST_URI"];

mysqli_set_charset($link, "utf8");

echo '<div class="navigation">';

?>

<div class="logo"><img src="../images/other/logo.png" /></div>

<?php

    echo '<ul>';

if (strpos($url,'index') !== false OR trim($url) == "/CAPS/") {
    echo '<li id="selected"><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li>
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false)) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li  id="selected"><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li>
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';

    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
else if (strpos($url,'organisations') !== false || strpos($url,'registered-organizations') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li id="selected">
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
else if (strpos($url,'calendar') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li>
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li id="selected"><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
else if (strpos($url,'statistics') !== false || strpos($url,'leaderboard') !== false) {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li>
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li id="selected">
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
else {
    echo '<li><a href="index.php">HOME</a></li>';
    echo '<li><a href="volunteers.php">VOLUNTEERS</a></li>';
    echo '<li>
    <a href="organisations.php">ORGANIZATIONS</a>
        <ul>
            <li><a href="organisations.php">REGISTER EVENT</a></li>
            <li><a href="registered-organizations.php">REGISTERED ORGANIZATIONS</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">CALENDAR</a></li>';
    echo '<li>
    <a href="statistics.php">STATISTICS</a>
        <ul>
            <li><a href="statistics.php">PLATFORM STATISTICS</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Login</a></li>';
        echo '<li class="log-reg"><a href="register.php">Register</a></li>';
    }
    else {
        echo '<li class="nav-user"> Connected as: <strong>' . $_SESSION['user']  .'</strong>
            <ul>
                <li class="logged-reg-top"><a href="account.php">Account</a></li>
                <li class="logged-reg-bottom"><a id="logout" href="index.php">Logout</a></li>
            </ul>
        </li>';

        include '../back-end/create-link.php';
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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' NEW notifications</a></li>';
        }
            

        }

    }
}

    echo '</ul>';
echo '</div>';

?>