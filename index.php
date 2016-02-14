<?php
include 'db.php';


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Geek Chat</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<style type="text/css">
			body{
				background-color:#272b30;
				color: #c8c8c8;
			}
			.container{
				padding-top: 10px;
				background-color: white;
			}
			.btn{
				font-weight: bold;
				color: #fff;
				background-color: #3a3e41;
				*background-color: #2e3134;	
			}
		</style>	
		<script type="text/javascript">
			function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat-box').innerHTML=req.responseText;
				}
			}
			req.open('GET','chat.php',true);
			req.send();
			}
			setInterval(function(){ajax()},1000);
		</script>			
	</head>
	<body onload="ajax();">
		<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="chat-box">
							<?php include 'chat.php'; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form class="form-group" method="post" action="index.php">
							<input name="name" type="text" placeholder="Name..." class="form-control"/><br/>
							<textarea name="msg" placeholder="Message..." class="form-control"></textarea><br/>
							<input type="submit" name="Send" class="btn btn-default"/>
						</form>
					</div>
				</div>
		</div>

		<?php
			if(isset($_POST['Send']))
			{
				$name = $_POST['name'];
				$msg = $_POST['msg'];

				$query = "INSERT INTO chat (name, msg) VALUES ('$name', '$msg')";	
				$run = $con->query($query);

				if($run)
				{
				echo "<embed loop='false' src='Content/chat.wav' hidden='true' autoplay='true'/>";
				}
			}
		?>				
	</body>
</html>