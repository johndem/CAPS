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
                
                <div id="calendar-tab">
                
                <?php
                        echo '<div class="side-widgets">';
                        include 'recent-events-widget.php'; 
                        include 'quick-search-widget.php';
				//include 'most-recent-event-widget.php';
                        echo '</div>';
                        ?>
                    <div id="calendar">
<!--                       <table></table>-->
				  
				 
				  
				  <table>
				  <tbody>
                    <tr> 
                        <td>Use the keyboard or click the arrows bellow to change months </td>
                    </tr>
					  <tr><td id='loading'>
                        </td> 
                    </tr>
                      <tr>
					  	<td id="manasou">
							<div  class="arrows" id="left" onclick="getResponseCal(this)">&nbsp;</div> <span class="cal-date" id="mon"><?php echo date('F'); ?></span > <span  class="cal-date" id="year"><?php echo date('Y'); ?></span><div class="arrows" id="right" onclick="getResponseCal(this)">&nbsp; </div>
							
						</td>
					  </tr>
					  
				  </tbody>
				  
				  </table>
                           <?php include 'calendar-plugin.php'; ?>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>