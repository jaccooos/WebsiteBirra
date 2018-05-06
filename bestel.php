<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['wachtwoord'])){	// Als we zijn ingelogd...
		$connection = mysqli_connect('localhost','monitor','Raspberry', 'projectbirra' );
		if (mysqli_connect_errno($connection)){
			echo ' something went wrong' ;
		}
		
		$gebruikersnaam = $_SESSION['username'];
		$query = mysqli_query($connection, "INSERT INTO bestelling (Username) VALUES ('" . $gebruikersnaam . "')");
		
		mysqli_close($connection);

		header('Location: bestelPagina.php?success');
	};
?> 
