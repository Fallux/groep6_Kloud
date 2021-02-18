<?php
$errors ='';
require 'config/config.php';

if($_POST['submit']==='Send')
{
    //keep it inside
   $email=$_POST['email'];
   $password=$_POST['password'];
    
   
    // $query = mysqli_query($con,"SELECT * FROM user_login WHERE email='$email'")

    // or die(mysqli_error($con));
	$query = "SELECT * FROM `user_login` WHERE email='$email'";
	$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
	if(mysqli_num_rows($result) > 0) {
	while($user= mysqli_fetch_assoc($result)) {
		$user_id=$user['id'];





}
	}
	$query="UPDATE `user_login` SET password = '$password' WHERE id=$user_id" ;
	// UPDATE `user_login` SET password = 1234567 WHERE id=14
	$result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));

	if($result) header('Location:./signin.php');
   }
		
	
?>

	




