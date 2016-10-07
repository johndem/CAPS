<?php

session_start();

if(isset($_SESSION['user'])){
    echo '<div class="logged">';
        echo '<a href="account.php"><div class="username">Καλωσήρθατε, ' . $_SESSION['user'] . '!</div></a>';
        echo '<div id="dropdownlist">';
            echo '<ul>';
				echo '<li><a href="account.php">Επεξεργασία Λογαριασμού</a></li>';
				echo '<li><a id="logout" href="index.php">Αποσύνδεση</a></li>';
            echo '</ul>';
        echo '</div>';
    echo '</div>';
}else{
    echo '<div class="registration">';
        echo '<ul>';
            echo '<li class="reg"><a href="register.php">Εγγραφή</a></li>';
            echo '<li class="reg"><a href="login.php">Είσοδος</a></li>';
        echo '</ul>';
    echo '</div>'; 
}

?>