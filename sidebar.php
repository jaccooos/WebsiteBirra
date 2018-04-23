<div id="kopje">
	
	<h2><img src="image/agenda.png"/> Agenda </h2>
</div>
<div id="text">

	<?php
	/*
		$connection = mysqli_connect('sql7.freesqldatabase.com','sql7233356','D5GhJlGVsW','sql7233356','3306');
		$datum_vandaag = date("Y-m-d H:i:s"); 
		$query = mysqli_query($connection, "SELECT Naam,DatumBegin,DatumEind FROM agenda WHERE DatumBegin > '".$datum_vandaag."' ORDER BY DatumBegin ASC LIMIT 3  "); 
		while ($resultaat = mysqli_fetch_assoc($query)){
			$DatumBegin= date("d-m-Y H:i", strtotime($resultaat['DatumBegin']));
			$DatumEind= date("d-m-Y H:i", strtotime($resultaat['DatumEind']));
			echo $resultaat['Naam'].'<br /><p class="datum">'.$DatumBegin.' t/m '.$DatumEind.'</p>';
			
}
	*/
	?>
</div>
<div id="foto1">
	<img src="image/foto1.png" width="50px"  alt="Foto van bloem"/>
</div>
<div id="foto1">
	<img src="image/foto1.png" width="50px"  alt="foto van kip"/>
</div>
<div id="foto1">
	<img src="image/foto1.png" width="50px"  alt="foto van taart"/>
</div>
