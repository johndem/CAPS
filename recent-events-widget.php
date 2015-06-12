<div class="recent-events"> 
<h3>Recent Events</h3>
	
	<?php 
	
	include 'create-link.php';
	
	$query = "SELECT id,title,category,area,image FROM events WHERE image<>'' ORDER BY id DESC LIMIT 2";
	
	$results = mysqli_query($link,$query);
	
	while ($row = mysqli_fetch_row($results)) {
		echo '<div class="event-info" onclick="window.location = '. "'event.php?id=$row[0]'" . '">'   ;
		echo '<div class="wid-image" style="background-image: url(' . "'" . $row[4] . "'" .  ');">';
		echo '</div>';
		echo '<div class="events-wid-title">' . $row[1] . '</div>';
		echo '<span><strong>Category:</strong> ' . $row[2] . '</span>';
		echo '<span><strong>At: </strong>' . $row[3] .'</span>';
		echo '</div>';
	}
	
	?>
	
</div>