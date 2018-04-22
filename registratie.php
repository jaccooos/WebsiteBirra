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
				<form method="post" action="registratie.php">
			<?php
			if (!empty($_POST)){
				$form = array($_POST['volledigenaam'], $_POST['geboortedatum'], $_POST['e-mail'],$_POST['gebruikersnaam'],$_POST['wachtwoord'],$_POST['wachtwoord2']);
			}else{
				$form = array("","","","","","");
			}
			
			print '
			<div id="kalender">
				<table id="registratietabel">
					<tr>
						<td>
							volledige naam:
						</td>
						
						<td>
							<input maxlength="60" type="text" value="'.$form[0].'" name="volledigenaam"/>
						</td>
						
					</tr>
					
					<tr>
						<td>
							geboortedatum:(jjjj-mm-dd)	
						</td>
						
						<td>
							<input maxlength="10" type="text" value="'.$form[1].'" name="geboortedatum"/>
						</td>
					</tr>
					
					<tr>
						<td>
							e-mail adres:
						</td>
						
						<td>
							<input maxlength="255" type="text" value="'.$form[2].'" name="e-mail"/>
						</td>
					</tr>
					
					<tr>
						<td>
							gebruikers naam:
						</td>
						
						<td>
							<input maxlength="16" type="text" value="'.$form[3].'" name="gebruikersnaam"/>
						</td>
					</tr>
					
					<tr>
						<td>
							wachtwoord:
						</td>
						
						<td>
							<input maxlength="32" type="password" value="'.$form[4].'" name="wachtwoord"/>
						</td>
					</tr>
					
					<tr>
						<td>
							herhaal wachtwoord:
						</td>
						
						<td>
							<input maxlength="32" type="password" value="'.$form[5].'" name="wachtwoord2"/>
						</td>
					</tr>
					 
					<tr>
						<td>
						</td>
						
						<td>
							<input id="regbuwq	tton" type="submit" value="registreeren"/>	
						</td>
					</tr>
					
					<tr>
						<td>
					
				';
					$connection = mysqli_connect('www.dewillem.org','H5groep2','H5groep2','h5groep2');
					if(mysqli_errno($connection)){
						echo' something ging fout'; 
					}
	
					if (!empty($_POST)){
						if((strlen($_POST['gebruikersnaam'])) > 4){
							if((strlen($_POST['wachtwoord'] )) > 4){
								if($_POST['wachtwoord'] == $_POST['wachtwoord2']){ 
									$query=mysqli_query($connection, "SELECT * FROM user WHERE Username = '".$_POST['gebruikersnaam']."'");
										if (mysqli_num_rows($query) == 0){
												mysqli_query($connection, "INSERT INTO user (Username, Email, Password, VolledigeNaam, GeboorteDatum, Schrijver, Admin, Fotograaf) VALUES ('".$_POST['gebruikersnaam']."','".$_POST['e-mail']."','".md5($_POST['wachtwoord'])."','".$_POST['volledigenaam']."','".$_POST['geboortedatum']."','0','0','0')");
													$query=mysqli_query($connection, "SELECT * FROM user WHERE Username = '".$_POST['gebruikersnaam']."'");
													if (mysqli_num_rows($query) == 1){
														echo'Het registreren is gelukt !! <br> Veel plezier op de site.';
													
													}else{
														echo 'Het is niet helemaal goed gegaan probeer het nog een keer';
													}
										}else{
											echo 'jouw gebruikers naam is al door iemand anders gekozen probeer een andere'; 
										}
								}else{ 
									echo 'wachtword komt niet overeen';
								}
							}else{
								echo 'wachtwoord moet minimaal 5 tekens zijn gebruik een ander wachtwoord';
							}
						}else{
							echo 'gebruikersnaam moet minimaal 5 tekens zijn gebruik een andere gebruikersnaam';
						}
					
			
		
			
			
	
					}else{}
		
					
				?>
				
						</td>
						
						<td>
							
						</td>
					</tr>
					
				</table>
			</div>
				</form>	
		</div>
	</body>
</html>

