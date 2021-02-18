<?php

$servername = "localhost";
$databasenaam    = "register_login";
$gebruikersnaam   = "root";
$wachtwoord   = "";
 $con = mysqli_connect($servername, $gebruikersnaam, $wachtwoord, $databasenaam) or die('Cannot connect to database. '.mysqli_connect_error());
 if($con) echo 'You are connected!<br/>';
?>