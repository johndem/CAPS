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
                        <div>
					
                            <table>
                                <thead>
                                    <tr>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                </thead>
					   <?php 
					    
					    $month = idate("m");
						//echo $month;
						$year = idate("Y");
						//echo $year;

						$month_start = strtotime('first day of this month', time());

						$day = idate('w', $month_start) - 1;
						
					    	$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
						//echo $number;
						
						$td = 0;
						$days = 1;
						for ($i=0 ; $i<6 ; $i++) {
							echo '<tr>';
							for ($j=0 ; $j<7 ; $j++) {
								if ($td<$day or $days>$number) {
									echo '<td><div></div></td>';
									
								}
								else {
									echo '<td><div>' . $days . '</div></td>';
									$days = $days + 1;
								}
								$td = $td + 1;
						
							}
							echo '</tr>';
						}
					    
					    ?>
<!--
                                <tr id='w0'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
                                <tr id='w1'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
                                <tr id='w2'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
                                <tr id='w3'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
                                <tr id='w4'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
                                <tr id='w5'>
                                    <td id="d0"><div></div></td>
                                    <td id="d1"><div></div></td>
                                    <td id="d2"><div></div></td>
                                    <td id="d3"><div></div></td>
                                    <td id="d4"><div></div></td>
                                    <td id="d5"><div></div></td>
                                    <td id="d6"><div></div></td>
                                </tr>
-->
                            </table>
                        </div>
                    </div>
                
                
            </div>
            
            <!-- footer -->
            <?php include 'footer.php'; ?>
            
        </div>
       
    </body>
    
   
</html>