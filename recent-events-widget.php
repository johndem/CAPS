<div class="recent-events"> 
<h3>Recent Events</h3>
	
	<?php 
	
	include 'create-link.php';
	
	$query = "SELECT title,category,id FROM events ORDER BY id DESC LIMIT 3";
	
	$results = mysqli_query($link,$query);
	
	while ($row = mysqli_fetch_row($results)) {
		echo '<div class="event-info" onclick="window.location = '. "'event.php?id=$row[2]'" . '">'   ;
		echo '<div class="events-wid-title">' . $row[0] . '</div>';
		echo '<span><strong>Category:</strong> ' . $row[1] . '</span>';
		echo '</div>';
	}
	
	?>
	
	
	

</div>