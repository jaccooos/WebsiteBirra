<?php
	session_start();
	$connection = mysqli_connect('sql7.freesqldatabase.com','sql7233356','D5GhJlGVsW','sql7233356','3306');
	if (mysqli_connect_errno($connection)){
		echo ' something went wrong' ;
	}

	$gebruikersnaam = mysqli_real_escape_string($connection, $_POST["gb"]);
	$wachtwoord = mysqli_real_escape_string($connection, md5($_POST["pass"]));
	
	$query = mysqli_query($connection, "SELECT * FROM user WHERE Username = '" . $gebruikersnaam . "' AND Password = '" . $wachtwoord . "'");
	if(mysqli_num_rows($query) == 1){
			$_SESSION['time']=date('YmdHis');
			$_SESSION['username']=$gebruikersnaam;
			$_SESSION['wachtwoord']=$wachtwoord;
			header('Location: ../index.php');
	}else{
		session_destroy();
	}
	mysqli_close($connection);
