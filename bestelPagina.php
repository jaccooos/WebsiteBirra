<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("header.php"); ?>
		<meta charset="windows-1252">
	</head>
	<body>
		<div id="wrapper">
			
			<div id="navagation">
				<?php include("navagation.php"); ?>
			</div>
			<div id="main">
				<h1>Bestel een biertje!</h1>
	
			<?php
				if(isset($_GET["success"])){
					print 'Biertje succesvol besteld!';
				}else{
					print '<a class="button" href="bestel.php">Bestel</a> ';
				}
			?>
			
		</div>
	</body>
</html>
