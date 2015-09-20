<?php
session_start();
$url = $_SERVER["REQUEST_URI"];

echo '<div class="navigation">';

?>

<div class="logo"><img src="images/logo.png" /></div>

<?php

    echo '<ul>';

if (strpos($url,'index') !== false OR trim($url) == "/CAPS/") {
    echo '<li id="selected"><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li>
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li>
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός</a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση</a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }
       
       

    }
}
else if ((strpos($url,'volunteers') !== false) || (strpos($url,'search-results') !== false) || (strpos($url,'event') !== false)) {
    echo '<li><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li  id="selected"><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li>
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li>
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';

    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση </a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }

    }
}
else if (strpos($url,'organisations') !== false || strpos($url,'registered-organizations') !== false) {
    echo '<li><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li id="selected">
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li>
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση </a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }

    }
}
else if (strpos($url,'calendar') !== false) {
    echo '<li ><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li>
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li id="selected" ><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li>
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση </a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }

    }
}
else if (strpos($url,'statistics') !== false || strpos($url,'leaderboard') !== false) {
    echo '<li><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li>
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li id="selected">
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση </a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }

    }
}
else {
    echo '<li><a href="index.php">ΑΡΧΙΚΗ</a></li>';
    echo '<li><a href="volunteers.php">ΕΘΕΛΟΝΤΕΣ</a></li>';
    echo '<li>
    <a href="organisations.php">ΟΡΓΑΝΙΣΜΟΙ</a>
        <ul>
            <li><a href="organisations.php">ΚΑΤΑΧΩΡΗΣΗ ΔΡΑΣΗΣ</a></li>
            <li><a href="registered-organizations.php">ΕΓΓΕΓΡΑΜΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ</a></li>
        </ul>
    </li>';
    echo '<li><a href="calendar.php">ΗΜΕΡΟΛΟΓΙΟ</a></li>';
    echo '<li>
    <a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ</a>
        <ul>
            <li><a href="statistics.php">ΣΤΑΤΙΣΤΙΚΑ ΧΑΡΤΗ</a></li>
            <li><a href="leaderboard.php">LEADERBOARD</a></li>
        </ul>
    </li>';
    
    if (!isset($_SESSION['user'])) {
        echo '<li class="log-reg"><a href="login.php">Είσοδος</a></li>';
        echo '<li class="log-reg"><a href="register.php">Εγγραφή</a></li>';
    }
    else {
        echo '<li class="nav-user"> Συνδεδεμένος/η ως: <strong>' . $_SESSION['user']  .'</strong></li>';
        echo '<li class="log-reg"><a href="account.php">Λογαριασμός </a></li>';
        echo '<li class="log-reg"><a id="logout" href="index.php">Αποσύνδεση </a></li>';

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
            echo '<li class="notif"><a href="account.php" onclick="notify(' . $id . ')"> ' . $row_cnt .  ' νέες ειδοποιήσεις</a></li>';
        }
            

        }

    }
}

    echo '</ul>';
echo '</div>';

?>