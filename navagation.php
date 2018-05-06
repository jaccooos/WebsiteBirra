<?php
	session_start();
	$ingelogd = false;
	if(isset($_SESSION['username']) && isset($_SESSION['wachtwoord'])){
		$ingelogd = true;
	};


	print '
		<div id="menu">
			
			<nav style="float:left; margin-top:35px; margin-left: 10px;">
				<a class="button" href="index.php"> Home</a>
	';
	
	if($ingelogd){
		print "<span> Welkom ".$_SESSION['username']."</span>";
	}
	
	print '
			</nav>
			<nav style="float:right; margin-top:35px; margin-right: 10px;">
	';
	if(!$ingelogd){
		print '<a class="button" href="Login2.php">Inloggen</a>';
	}
	
	print ' <a class="button" href="Status.php">Statussen</a> ';
	
	if(!$ingelogd){
		print ' <a class="button" href="registratie.php">Registreren</a> ';
	}	
	
	print ' <a class="button" href="Myadmin/index.php">Database</a> ';
	
	if($ingelogd){
		print ' <a class="button" href="bestelPagina.php">Bestel</a> ';
		
		print ' <a class="button" href="uitloggen.php">Uitloggen</a> ';
	}
	
	print '
			</nav>
		</div>
	';

?>
