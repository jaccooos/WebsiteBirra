<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<script type="text/javascript">
	  setTimeout(function()
		{location = ''},5*1000)
	</script>
	
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
				<h1>De huidige statussen</h1>
			<?php
				
				$connection = mysqli_connect('sql7.freesqldatabase.com','sql7234794','xQ8u9lhzpC','sql7234794','3306');
				if(mysqli_errno($connection)){
					echo' something ging fout'; 
				}
				
				$query = mysqli_query($connection, "SELECT * FROM Statussen");
				
				
				$row = mysqli_fetch_assoc($query);
				
				echo '<h3>Vooraad:' . $row["Vooraad"]. "</h3>";
				echo '<h3>Magazijn:' . $row["Magazijn"]. "</h3>";
				
				
				
				if( $row["Bezig"] = 1)
				{
					echo '<h3>De Birra is nu Bezig</h3>';
						if($row["Status"] = 0)
						{
							echo '<h3>Huidige bezigheid is: Beker laten vallen</h3>';
						}
						elseif($row["Status"] = 1)
						{
							echo '<h3>Huidige bezigheid is: Bekker vullen</h3>';
						}
						elseif($row["Status"] = 2)
						{
							echo '<h3>Huidige bezigheid is: Carocel draaien</h3>';
						}
						elseif($row["Status"] = 2)
						{
							echo '<h3>Huidige bezigheid is: Deur openen</h3>';
						}
						elseif($row["Status"] = 2)
						{
							echo '<h3>Huidige bezigheid is: Wachten tot het biertje gepakt is</h3>';
						}
						elseif($row["Status"] = 2)
						{
							echo '<h3>Huidige bezigheid is: Deur dicht doen</h3>';
						}
						else
						{
							echo '<h3>Geen verdere informatie beschikbaar</h3>';
						}						
				}	
				elseif( $row["Gereed"] = 1)
				{
					echo '<h3>De BIrra is nu Gereed</h3>';
				}	
				elseif( $row["Error"] = 1)
				{
					echo '<h3>De BIrra heeft een Error</h3>';
				}	
			?>
			</div>
		</div>
	</body>
</html>
