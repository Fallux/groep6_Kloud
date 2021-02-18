<?php
// Plaats hier de code die zorgt voor een verbinding met de database
require 'config.php';
	// Plaats hier de code die checkt of het sign-up formulier verzonden werd (submit). Nieuwe gebruiker aanmaken dus!
if( isset($_POST['submit']) ) {
		// Get POST values
$foto = mysqli_real_escape_string($con, trim($_POST['foto']));
$title = mysqli_real_escape_string($con, trim($_POST['title']));
$presentator = mysqli_real_escape_string($con, trim($_POST['presentator']));
$startdatum = mysqli_real_escape_string($con, trim($_POST['startdatum']));
$einddatum = mysqli_real_escape_string($con, trim($_POST['einddatum']));
$aantalplaatsen  = mysqli_real_escape_string($con, trim($_POST['aantalplaatsen']));
$aanmeldingen = mysqli_real_escape_string($con, trim($_POST['aanmeldingen']));
// Get current datetime
$dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
$datetime = $dt->format('d-m-Y H:i:s');
// Keep track of validated values
$valid = array('foto'=>false, 'title'=>false, 'startdatum'=>false, 'einddatum'=>false, 'aantalplaatsen'=>false);
// Validate foto
if( !empty($foto) ) {
     $valid['foto'] = true;
}else{
 echo 'foto cannot be blank!<br/>';
}
// Validate title
if( !empty($title) ) {
 if( strlen($title) >= 2 && strlen($title) <= 40 ) {
   if( !preg_match('/[^a-zA-Z\s]/', $title) ) {
     $valid['title'] = true;
     echo 'title is OK! <br/>';
   }else{
     echo 'title can contain only letters!<br/>';
   }
 }else{
   echo 'title must be between 2 and 40 characters long!<br/>';
 }
}else{
 echo 'title cannot be blank!<br/>';
}



	$query = "INSERT INTO `events` (`foto`, `title`,`presentator`, `startdatum`, `einddatum`, `aantalplaatsen`,`aanmeldingen`) VALUES ('$foto','$title','$presentator','$startdatum','$einddatum',$aantalplaatsen,$aanmeldingen)";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  header('Location:../event.php');
	}
   }		
	
	
// Plaats hier de code die checkt of er een DELETE moet plaatsvinden (verwijdering van gebruiker in de database)
// Check if DELETE is requested

if( isset($_GET['del']) ) {
	$id = $_GET['del'];
	$query = "DELETE FROM `user_events` WHERE events_id=$id";
	$result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
	if($result) {
	  echo 'Data deleted from database.';
	  mysqli_free_result($result);
	  
	}
	$query = "DELETE FROM `events` WHERE id=$id";

	$result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
	if($result) {
	  echo 'Data deleted from database.';
	  mysqli_free_result($result);
	  header('Location:../event.php');
	}
   }

	// Plaats hier de code die checkt of het update formulier verzonden werd (submit). Bestaande gebruiker updaten dus!
	// Check if update-form is submitted
if( isset($_POST['btnupdate']) ) {
	$id = $_GET['id'];
	$foto = $_POST['foto'];
	$title  = $_POST['title'];
	$startdatum     = $_POST['startdatum'];
	$einddatum  = $_POST['einddatum'];
	$aantalplaatsen  = intval($_POST['aantalplaatsen']);
	$aanmeldingen  = intval($_POST['aanmeldingen']);
	$query="UPDATE `events` SET `foto`='$foto',`title`='$title',`startdatum`='$startdatum',`einddatum`='$einddatum',`aantalplaatsen`=$aantalplaatsen, `aanmeldingen`=$aanmeldingen WHERE `id`=$id";
	// $query  = "UPDATE 'tbl_users' SET foto='$foto', title='$title', startdatum='$startdatum', einddatum='$einddatum', aantalplaatsen='$aantalplaatsen' WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
	$user   = mysqli_fetch_assoc($result);
	if($result) header('Location:../event.php');
   }
   
//booking ,insert

if( isset($_GET['booking']) ) {
$user_id= $_GET['user_id'];
// print_r($user_id);
$event_id= $_GET['booking'];
// print_r($event_id);



$query = "INSERT INTO `user_events` (`user_id`,`events_id`) VALUES ($user_id, $event_id)";
$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
if($result) {
	echo 'Data inserted into database.';
	mysqli_free_result($result);
	  
	}
   
   $query="UPDATE `events` SET `aanmeldingen`=`aanmeldingen`+1 WHERE `id`=$event_id";
  
   $result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
   $user   = mysqli_fetch_assoc($result);
   if($result) header('Location:../index.php');
}


	

	
?>