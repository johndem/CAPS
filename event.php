<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
    </head>
    <body>
		
        
            <!-- registration or username -->
            <?php include 'log-state.php'; ?>

            <!-- masthead -->
            <?php include 'masthead.php'; ?>

            <!-- navigation -->
            <?php include 'navigation.php'; ?>

            <!-- content -->
            <div class="content">
                <?php include 'find-event.php'; ?>
                <h1 class="center-title"><?php echo "$row[2]"; ?></h1>

                <div id="news-body">
                    <ul id="event-chars">
                        <li><?php echo "Category: " . $row[3]; ?></li>
                        <li><?php echo "Address: " . $row[4] . " " . $row[5] . ", " . $row[7] . ", " . $row[6]; ?></li>
                        <li><?php echo "Date: " . $row[8] . ", " . $row[9]; ?></li>
                        <li><?php echo "Recommended age group: " . $row[10]; ?></li>
                        <li><?php echo "Optional skills: " . $row[11]; ?></li>
                    </ul>
                    <div id="event-body"><?php echo $row[13]; ?></div>
                    
                </div>
                
                <div id="home-blanket">
                
                </div>

            </div>

            <!-- footer -->
            <?php include 'footer.php'; ?>

        

    </body>


</html>