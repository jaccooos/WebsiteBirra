<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<script type="text/javascript">
	  setTimeout(function()
		{location = ''},5*1000)
	</script>
	
	<head>
		<?php include("header.php"); ?>
	</head>
	<body>
		<div id="wrapper">
			
			<div id="navagation">
				<?php include("navagation.php"); ?>
			</div>
			<?php
				$connection = mysqli_connect('sql7.freesqldatabase.com','sql7234794','xQ8u9lhzpC','sql7234794','3306');
				if(mysqli_errno($connection)){
					echo' something ging fout'; 
				}
				
				$query = mysqli_query($connection, "SELECT * FROM Statussen");
				
				
				$row = mysqli_fetch_assoc($query);
				
				echo 'Vooraad:' . $row["Vooraad"]. "<br>";
				echo 'Magazijn:' . $row["Magazijn"]. "<br>";
				
				
				
				if( $row["Bezig"] = 1)
				{
					echo 'De Birra is nu Bezig<br>';
						if($row["Status"] = 0)
						{
							echo 'Huidige bezigheid is: Beker laten vallen';
						}
						elseif($row["Status"] = 1)
						{
							echo 'Huidige bezigheid is: Bekker vullen';
						}
						elseif($row["Status"] = 2)
						{
							echo 'Huidige bezigheid is: Carocel draaien';
						}
						elseif($row["Status"] = 2)
						{
							echo 'Huidige bezigheid is: Deur openen';
						}
						elseif($row["Status"] = 2)
						{
							echo 'Huidige bezigheid is: Wachten tot het biertje gepakt is';
						}
						elseif($row["Status"] = 2)
						{
							echo 'Huidige bezigheid is: Deur dicht doen';
						}
						else
						{
							echo 'Geen verdere informatie beschikbaar';
						}						
				}	
				elseif( $row["Gereed"] = 1)
				{
					echo 'De BIrra is nu Gereed';
				}	
				elseif( $row["Error"] = 1)
				{
					echo 'De BIrra heeft een Error';
				}	
			?>
		</div>
	</body>
</html>
