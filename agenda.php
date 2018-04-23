<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("header.php"); ?>
	</head>
	<body>
		<div id="wrapper">
			
			<div id="navagation">
				<?php include("navagation.php"); ?>
			</div>
			
			<div id="slider">
				
			</div>
			
			<div id="sidebar">
				<?php include("sidebar.php"); ?>
			</div>
			
			<div id="reactie">
				<?php include("reactie.php"); ?>
			</div>
		</div>
		<div id="wrapper">
			<div id="navagation">
				<?php include("navagation.php"); ?>
			</div>
			<div id="kalender">
				<?php
					$connection = mysqli_connect('sql7.freesqldatabase.com','sql7233356','sql7233356','D5GhJlGVsW');
					if(mysqli_errno($connection)){
						echo' something ging fout'; 
					}
					if(empty($_POST['jaar'])){
						$jaar = date("Y");
						$maand = date("m");
					}else{
						$jaar = $_POST['jaar'];
						$maand = $_POST['maand'];
					}
						
					$query = mysqli_query($connection, "SELECT * FROM agenda WHERE DatumBegin LIKE '".$jaar."-".$maand."%' OR DatumEind LIKE '".$jaar."-".$maand."%' ");

					$totaaldagen =  cal_days_in_month(CAL_GREGORIAN, $maand,$jaar);					
					$firstday =  date('N',mktime(0, 0, 0, date($maand), 1,  date($jaar)));
					$last = 0;			
					print ' <form method="post" action="'.$_SERVER['PHP_SELF'].'">
						<table id="agenda" style="border: 1px solid black;">
							
								<tr>
									<th></th>
									<th></th>
									<th>	
										<select id="maand" name="maand">
											<option value="01" >Januari</option>
											<option value="02" >Februari</option>
											<option value="03" >Maart</option>
											<option value="04" >April</option>
											<option value="05" >Mei</option>
											<option value="06" >Juni</option>
											<option value="07" >Juli</option>
											<option value="08" >Augustus</option>
											<option value="09" >September</option>
											<option value="10" >Oktober</option>
											<option value="11" >November</option>
											<option value="12" >December</option>
										</select>
									</th>
									<th>
										<select id="jaar" name="jaar">
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
										</select>
									</th>
									<th>
										<input id="submit"  type="submit" value="Zoeken"/>
									</th>
									<th></th>
									<th></th>
									
								</tr>
								<tr>
									<th>MA</th>
									<th>DI</th>
									<th>WO</th>
									<th>DO</th>
									<th>VR</th>
									<th>ZA</th>
									<th>ZO</th>
								</tr>
								<tr>';
						for($i=1; $i <=(43-$totaaldagen); $i++){
							if($i==$firstday){
								for($m=1; $m <=$totaaldagen; $m++){
									echo '<td id='.$m.'>'.$m.'</td>';
									if(($i + $m - 1) % 7 == 0){
										echo '</tr><tr>'; 
								}
								$last = $m;
							}
						}else{
							echo'<td></td>';
							if($last + $i == 36){
								break;
							}
						}
					}
					echo '</tr></table></form>';
					$jsarray = " var agendaArray =[";
					$i = 0;
					while($resultaat = mysqli_fetch_assoc($query)){
						$begindag = date("d", strtotime($resultaat['DatumBegin']));
						$einddag = date("d", strtotime($resultaat['DatumEind']));
						$jsarray = $jsarray."['".$begindag."','".$einddag."','".$resultaat['Naam']."','".$resultaat['Beschrijving']."','".$resultaat['DatumBegin']."','".$resultaat['DatumEind']."'],'".$i."']";
						$i++; 
					}
					$jsarray = $jsarray."];";	
					
					print '
						<script type="text/javascript">
							var jaar = document.getElementById(\'jaar\').value = "'.$jaar.'";
							jaar.selected ="true";
							var maand = document.getElementById(\'maand\').value = "'.$maand.'";
							maand.selected ="true";
							'.$jsarray.' //zet de gemaakte array in de js
							
							for (var i =0; i <= agendaArray[0].length; i++){ //zorgt dat elk item op de juiste plaats komt
								for(var dag = agendaArray[i][0]; dag <= agendaArray[i][1]; dag++){
									document.getElementById(parseInt(dag)).innerHTML += " <br/><a onClick=viewitem("+ i +")>" +  agendaArray[i][2] + "</a>";
								}
							}
							function viewitem(id){
								document.getElementById("titel").innerHTML = agendaArray[id][2];
								
							}
					
						</script>';	
				?>
				<p id="titel"></p>
				<p id="beschrijving"></p>
				<p id="datum"></p>
			</div>
		</div>	
	</body>
</html>

