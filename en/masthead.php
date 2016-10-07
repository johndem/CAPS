<div class="back"> 

<?php 

$url = $_SERVER["REQUEST_URI"];
if (strpos($url,'en/index') !== false OR trim($url) == "/CAPS/en/") {
    echo '<div class="masthead">';
    // echo '<h1 id="title"></h1>'; 
    
?>

<?php

?>

<div id="categories">
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Healthcare'" id="hc" class="cat-img" src="../images/masthead/en/hc-gray.png"/>
    </div>
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Education'" id="edu" class="cat-img" src="../images/masthead/en/edu-gray.png"/>
    </div>
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Emergency'" id="em" class="cat-img" src="../images/masthead/en/em-gray.png"/>
    </div>
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Environment'" id="env" class="cat-img" src="../images/masthead/en/env-gray.png"/>
    </div>
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Communities'" id="com" class="cat-img" src="../images/masthead/en/com-gray.png"/>
    </div>
    <div class="cat"><img onclick="window.location= 'search-results.php?category=Animals'" id="an" class="cat-img" src="../images/masthead/en/an-gray.png"/>
    </div>
</div>

<?php 

} else {
	echo '<div class="masthead_rest">';
    // echo '<h1 id="title">TEAM THESSALONIKI VOLUNTEER NETWORK</h1>';

} echo '</div>';

?>

</div>