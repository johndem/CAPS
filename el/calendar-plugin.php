<?php 
echo  '<div id="cal-cont">';					
echo '<table>
                                <thead>
                                    <tr>
                                        <th>Δευτέρα</th>
                                        <th>Τρίτη</th>
                                        <th>Τετάρτη</th>
                                        <th>Πέμπτη</th>
                                        <th>Παρασκευή</th>
                                        <th>Σάββατο</th>
                                        <th>Κυριακή</th>
                                    </tr>
                                </thead>' ; 
					  
					   
					    	include 'create-link.php';
					    	$month = idate("m");
						//echo $month;
						$year = idate("Y");
						//echo $year;
						

						$month_start = strtotime('first day of this month', time());

						$day = idate('w', $month_start) - 1;
						if ($day == -1) $day = 6;
					    	$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
						
						if ($month<10) $date = '' . $year . '-0' . $month . '-';
    						else $date = '' . $year . '-' . $month . '-';
												
						$td = 0;
						$days = 1;
						for ($i=0 ; $i<6 ; $i++) {
							echo '<tr>';
							for ($j=0 ; $j<7 ; $j++) {
								if ($td<$day or $days>$number) {
									echo '<td class="td-cells"><div></div></td>';
									
								}
								else {
									if ($days < 10) $newDate = $date .'0' . $days;
									else $newDate = $date . $days;
									//echo $newDate . "  ";
									$query = "SELECT id,title FROM events WHERE day = '$newDate' AND (status = '1' OR status= '2')";
								      $results = mysqli_query($link,$query);
								      //$row = mysqli_fetch_row($results);
									echo '<td class="td-cells"><div class="cal-num">' . $days . '</div>';
									while ($row = mysqli_fetch_row($results)) {
									echo '<div class="cal-el"><span onclick="window.location = '. "'event.php?id=$row[0]'" . '">' . $row[1]  . '</a></span></div>'; 
									}
									echo '</td>';
									
									$days = $days + 1;
								}
								$td = $td + 1;
						
							}
							echo '</tr>';
						}
					    
					    
						 

                          echo  '</table>';
 				echo ' </div>';
?>