<?php //Was een moeilijke opgaven maar door de stappen te volgen en hulp vragen is het goed gegaan
	// Plaats hier de code die zorgt voor een verbinding met de database
	require 'config.php';
	// Plaats hier de code die checkt of het sign-up formulier verzonden werd (submit). Nieuwe gebruiker aanmaken dus!
	if( isset($_POST['submit']) ) {
		// Get POST values
$firstname = mysqli_real_escape_string($con, trim($_POST['firstname']));
$lastname = mysqli_real_escape_string($con, trim($_POST['lastname']));
$email = mysqli_real_escape_string($con, trim($_POST['email']));
$username = mysqli_real_escape_string($con, trim($_POST['username']));
$password  = mysqli_real_escape_string($con, trim($_POST['password']));
// Get current datetime
$dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
$datetime = $dt->format('d-m-Y H:i:s');
// Keep track of validated values
$valid = array('firstname'=>false, 'lastname'=>false, 'email'=>false, 'username'=>false, 'password'=>false);
// Validate firstname
if( !empty($firstname) ) {
 if( strlen($firstname) >= 2 && strlen($firstname) <= 40 ) {
   if( !preg_match('/[^a-zA-Z\s]/', $firstname) ) {
     $valid['firstname'] = true;
     echo 'Firstname is OK! <br/>';
   }else{
     echo 'Firstname can contain only letters!<br/>';
   }
 }else{
   echo 'Firstname must be between 2 and 40 characters long!<br/>';
 }
}else{
 echo 'Firstname cannot be blank!<br/>';
}
// Validate lastname
if( !empty($lastname) ) {
 if( strlen($lastname) >= 2 && strlen($lastname) <= 40 ) {
   if( !preg_match('/[^a-zA-Z\s]/', $lastname) ) {
     $valid['lastname'] = true;
     echo 'Lastname is OK! <br/>';
   }else{
     echo 'Lastname can contain only letters!<br/>';
   }
 }else{
   echo 'Lastname must be between 2 and 40 characters long!<br/>';
 }
}else{
 echo 'Lastname cannot be blank!<br/>';
}
// Validate email
if( !empty($email) ) {
 if( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
   $valid['email'] = true;
   echo 'E-mail is OK!<br/>';
 }else{
   echo 'E-mail is invalid!<br/>';
 }
}else{
 echo 'E-mail cannot be blank!<br/>';
}
// Validate username
if( !empty($username) ) {
 if( strlen($username) >= 2 && strlen($username) <= 16 ) {
   if( !preg_match('/[^a-zA-Z\d_.]/', $username) ) {
     $valid['username'] = true;
     echo 'Username is OK! <br/>';
   }else{
     echo 'Username can contain only letters!<br/>';
   }
 }else{
   echo 'Username must be between 2 and 16 characters long!<br/>';
 }
}else{
 echo 'Username cannot be blank!<br/>';
}
// Validate password
if( !empty($password) ) {
 if( strlen($password) >= 5 && strlen($password) <= 32 ) {
   $valid['password'] = true;
   $password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
   echo 'Password is OK!<br/>';
 }else{
   echo 'Password must be between 5 and 32 characters!<br/>';
 }
}else{
 echo 'Password cannot be blank!<br/>';
}
if($valid['firstname'] && $valid['lastname'] && $valid['email'] && $valid['username'] && $valid['password']) {
	$query = "INSERT INTO `admin_overzicht_gebruikers` (`firstname`, `lastname`, `email`, `username`, `password`, `registration`) VALUES ('$firstname','$lastname','$email','$username','$password','$datetime')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  header('Location:../index.php');
	}
   }
}
	// Plaats hier de code die checkt of er een DELETE moet plaatsvinden (verwijdering van gebruiker in de database)
// Check if DELETE is requested
if( isset($_GET['del']) ) {
	$id = $_GET['del'];
	$query = "DELETE FROM `admin_overzicht_gebruikers` WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
	if($result) {
	  echo 'Data deleted from database.';
	  mysqli_free_result($result);
	  header('Location:../index.php');
	}
   }
	// Plaats hier de code die checkt of het update formulier verzonden werd (submit). Bestaande gebruiker updaten dus!
// Check if update-form is submitted
if( isset($_POST['btnupdate']) ) {
	$id = $_GET['id'];
	$firstname = $_POST['firstname']; //
	$lastname  = $_POST['lastname'];
	$email     = $_POST['email'];
	$username  = $_POST['username'];
	$password  = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost"=>8]); //hier word het wachtwoord geencrypt
	$query  = "UPDATE `admin_overzicht_gebruikers` SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', password='$password' WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
	$user   = mysqli_fetch_assoc($result);
	if($result) header('Location:../index.php');
   }
?>