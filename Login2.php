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
				<h1>Login:</h1>

				<br />
				<br />
				<form method="post" action="login.php">
					<table id="registratietabel">
						<tr>
							<td>
								Gebruikersnaam: 
							</td>
							<td>
								<input name="gb" type="text"/> <br />
							</td>
						</tr>
						<tr>
							<td>
								Wachtwoord: 
							</td>
							<td>
								<input name="pass" type="password"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="inloggen" />
							</td>
						</tr>
					</table>
				</form>
			</div>
			<?php
				if(isset($_GET["error"])){
					print 'Inlog ongeldig';
				}
			?>
			<div id="main" style="float:left; margin-top:35px; margin-left: 20px;">
				<a class="buttonreg" href="registratie.php">Registreren</a>
			</div>
			
		</div>
	</body>
</html>
