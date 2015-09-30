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
                    <div class="main-title"> Advanced Search</div>  
                    <h4> Search for a volunteer opportunity and get started! </h4>
                    </div>
                <div class="aligner">
                    
                    
                    <?php
                        echo '<div class="side-widgets">';
                        include 'recent-events-widget.php'; 
                        echo '</div>';
                        ?>
                    
                    <form action="search-results.php" method="get" id="volunteers-form">
                       

                        <div id="search-cat">
                            <div class="h3">Categories:</div>
                            <div>
                                <div id="radio-left">
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Εκπαίδευση" /> 
                                        Education    
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Περίθαλψη" />
                                        Healthcare 
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Περιβάλλον" />
                                        Environment      
                                    </div>
                                </div>
                                <div id="radio-right">
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Ζώα" />
                                        Animals
                                    </div> 
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Έκτακτη Ανάγκη" />
                                        Emergency
                                    </div>
                                    <div class="align-left">
                                        <input type="radio" name="category" value="Κοινότητες" />
                                        Communities
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="search-select">
                            <div class="h3">District:</div>
                            <div class="in">
                                <select name="areas">
                                    <option selected="selected" value="0">Select one</option>
                                    <?php
                                        include 'create-link.php';

                                        $query = "SELECT * FROM districts";
                                        $results = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_row($results)) {
                                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Agegroup:</div>
                            <div class="in">
                                <select name="ages">
                                    <option selected="selected" value="0">Select one</option>
                                    <?php
                                        include 'create-link.php';

                                        $query = "SELECT * FROM agegroups";
                                        $results = mysqli_query($link,$query);

                                        $i = 1;
                                        while ($row = mysqli_fetch_row($results)) {
                                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-select">
                            <div class="h3">Optional Skills:</div>
                            <div class="in">
                                <select id="skills" name="skills" multiple>
                                    <option disabled selected="selected">- Hold Ctrl for multiple selection -</option>
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
                            <div class="h3">Date:</div>
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