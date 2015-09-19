<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TEAM THESSALONIKI VOLUNTEER NETWORK</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jq.js"></script>
		<script src="form-check.js"></script>
    </head>
    <body>
        
		
        <div>
        
             <!-- registration or username -->
        <?php// include 'log-state.php'; ?>

        
        

        <!-- navigation -->
         <?php include 'navigation.php'; ?>
        <h1 class="center-title"></h1>

        <!-- masthead -->
        <?php include 'masthead.php'; ?>
            <!-- content -->
            <div class="content">
                <h1 class="center-title"></h1>
                <div class="page-title"> 
                    <div class="main-title"> Εκτενής Αναζήτηση</div>  
                    <h4> Αναζητείστε εθελοντικές δράσεις και ξεκινήστε τον εθελοντισμό! </h4>
                    </div>
                <div class="aligner">
                    
                    
                    <?php
                        echo '<div class="side-widgets">';
                        include 'recent-events-widget.php'; 
                        echo '</div>';
                        ?>
                    
                    <form action="search-results.php" method="get" id="volunteers-form">
                       

                        <div id="search-cat">
                            <div class="h3">Κατηγορίες:</div>
                            <div>
                                
                                <?php
                                    include 'create-link.php';

                                    $query = "SELECT * FROM categories";
                                    $results = mysqli_query($link,$query);

                                    $counter = 0;
                                    echo '<div id="radio-left">';
                                    while ($counter < 3) {
                                        $row = mysqli_fetch_row($results);
                                        echo '<div class="align-left">';
                                        echo '<input type="radio" name="' . $row[1] . '" value="' . $row[0] . '" />';
                                        echo $row[1];
                                        echo '</div>';  
                                        $counter++;
                                    }
                                    echo '</div>';

                                    echo '<div id="radio-right">';
                                    while ($row = mysqli_fetch_row($results)) {
                                        echo '<div class="align-left">';
                                        echo '<input type="radio" name="' . $row[1] . '" value="' . $row[0] . '" />';
                                        echo $row[1];
                                        echo '</div>';  
                                    }
                                    echo '</div>';
                                     
                                ?>
                                
                            </div>
                        </div>
                        
                        
                        <div class="search-select">
                            <div class="h3">Περιοχή:</div>
                            <div class="in">
                                <select name="areas">
                                    <option selected="selected" value="0">Επιλέξτε ένα</option>
                                    <?php
                                        include 'create-link.php';

                                        $query = "SELECT * FROM districts";
                                        $results = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_row($results)) {
                                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Ηλικιακή ομάδα:</div>
                            <div class="in">
                                <select name="ages">
                                    <option selected="selected" value="0">Επιλέξτε ένα</option>
                                    <?php
                                        include 'create-link.php';

                                        $query = "SELECT * FROM agegroups";
                                        $results = mysqli_query($link,$query);

                                        $i = 1;
                                        while ($row = mysqli_fetch_row($results)) {
                                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Προαιρετικές δεξιότητες:</div>
                            <div class="in">
                                <select id="skills" name="skills" multiple>
                                    <option disabled selected="selected">- Κρατήστε πατημένο το Ctrl για πολλαπλές επιλογές -</option>
                                    <?php
                                        include 'create-link.php';

                                        $query = "SELECT * FROM skills";
                                        $results = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_row($results)) {
                                            echo '<option label="' . $row[2] . '" value="' . $row[1] . '">' . $row[2] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Ημερομηνία:</div>
                            <input id="dob" class="in" maxlength="50" name="date" size="30" type="date" value="" />
                        </div>

                        <div id="go">
                            <input type="submit" class="submitBtn" name="submit" value="Αναζήτηση" />
                        </div> 

                    </form>
                    
                </div>
                
                <div id="reg-blanket">
                
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>