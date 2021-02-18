
<?php
// $errors = array();
if(isset($_POST['submit']))
{
    $db=mysqli_connect("Localhost","root","","register_login");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // receive all input values from the form
	$password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($password))
	{
		array_push($errors, '<div class="alert alert-danger" role="alert">Password is required</div>');
	}
    $query = mysqli_query($db,"SELECT * FROM user_login WHERE `user_login`.`id` = 1")
    or die(mysqli_error($db)); 

   
}

?>
