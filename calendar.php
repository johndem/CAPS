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
	    <script src="cal-util.js"></script>
    </head>
    <body>
	
        
        <div>
        
            <!-- registration or username -->
            <?php include 'log-state.php'; ?>

            <!-- masthead -->
            <?php include 'masthead.php'; ?>

            <!-- navigation -->
            <?php include 'navigation.php'; ?>
            
            <!-- content -->
            <div class="content">
                <h1 class="center-title">Find an opportunity in Calendar</h1>
                
                
                    <div id="calendar">
<!--                       <table></table>-->
				  
				 
				  
				  <table>
				  <tbody>
					  <tr>
					  	<td id="manasou">
							<span  class="arrows" id="left" onclick="getResponseCal(this)"> &lArr;</span> <span class="cal-date" id="mon"><?php echo date('F'); ?></span > <span  class="cal-date" id="year"><?php echo date('Y'); ?></span><span class="arrows" id="right" onclick="getResponseCal(this)">&rArr;</span>
							
						</td>
					  </tr>
					  
				  </tbody>
				  
				  </table>
                           <?php include 'calendar-plugin.php'; ?>
                    </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>