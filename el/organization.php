<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
    </head>
    <body>
		
        <!-- registration or username -->
        <?php //include 'log-state.php'; ?>

        <!-- navigation -->
        <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>

        <!-- content -->
        <div class="content">
            
            <h1 class="center-title"></h1>
            
            <?php include 'find-org.php'; ?>
            <!-- <h1 class="center-title"><?php echo "$org[4]"; ?></h1> -->
            
            <div class="page-title"> 
                <div class="main-title"><?php echo "$org[4]"; ?></div>  
                <h4>Πληροφορίες οργανισμού</h4>
            </div>
            
            <div id="organization-page"> 

                <?php
                echo '<div class="side-widgets">';
                include 'recent-events-widget.php'; 
                include 'quick-search-widget.php';
                echo '</div>';
                ?>

                <div id="organization-info">

                    <?php
                    echo '<img src="' . $org[10] . '" width="200" height="200" />';
                    echo '<div>';
                    if ($org[5] != "") {
                        echo '<h3><a href="' . $org[5] . '">Επισκεφτείτε την ιστοσελίδα μας</a></h3>';
                    }
                    if ($org[6] != "") {
                        echo '<h3><a href="' . $org[6] . '">Βρείτε μας στο Facebook</a></h3>';
                    }
                    if ($org[7] != "") {
                        echo '<h3><a href="' . $org[7] . '">Βρείτε μας στο Twitter</a></h3>';
                    }
                    if ($org[8] != "") {
                        echo '<h3><a href="' . $org[8] . '">Άλλο</a></h3>';
                    }
                    echo '<div id="org-desc">';
                    echo '<h3>Επικοινωνήστε μαζί μας στο: ' . $org[2] . '</h3>';
                    echo $org[9] . '</div>';
                    echo '</div>';
                    ?>

                </div>

                <div id="event-blanket">

                </div>

            </div>
            
        </div>

        <!-- footer -->
        <?php include 'footer.php'; ?>
        
    </body>
</html>