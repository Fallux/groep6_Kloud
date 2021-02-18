<?php
	 $con = mysqli_connect('localhost', 'root', '', 'kloud_gebruikers') or die('Cannot connect to database. '.mysqli_connect_error());
	 if($con) echo 'You are connected!<br/>';// Plaats hier de code die ervoor zorg dat er een database verbinding wordt aangemaakt. (met jouw gegevens!!)
	 //root is de standaard gebruikersnaam voor XAMP en root gerbuikersnaam EN wachtwoord is voor MAMP
	//  localhost= servername
	//  root=gebruikersnaam
	//  ''=wachtwoord
	//  cms= naam van je database (zoals sportinstuif)

?>
