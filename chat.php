<?php
	include 'db.php';

	$query = "SELECT * FROM chat ORDER BY id DESC";
	$run = $con->query($query);

	while($row = $run->fetch_array()):
?>
	<div id="chat-msg">
		<span style="color:Gray;font-weight: bold;"><?php echo $row['name']; ?>: </span>
		<span><?php echo $row['msg']; ?></span>
		<span style="float:right;"><?php echo $row['datetime']; ?></span>
	</div>
<?php endwhile; ?>