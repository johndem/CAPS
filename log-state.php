<?php

session_start();

if(isset($_SESSION['user'])){
    echo '<div class="logged">';
        echo '<a href="account.php"><div class="username">Welcome,' . $_SESSION['user'] . '!</div></a>';
        echo '<div id="dropdownlist">';
            echo '<ul>';
				echo '<li><a href="account.php">Edit my profile</a></li>';
				echo '<li><a href="index.php">Log Out</a></li>';
            echo '</ul>';
        echo '</div>';
    echo '</div>';
}else{
    echo '<div class="registration">';
        echo '<ul>';
            echo '<li class="reg"><a href="register.php">Register</a></li>';
            echo '<li class="reg"><a href="login.php">Login</a></li>';
        echo '</ul>';
    echo '</div>'; 
}

?>