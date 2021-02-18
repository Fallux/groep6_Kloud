<?php 
require 'config/config.php';
	session_start(); 
	$user_id=" ";
	$email = $_SESSION['email'];
	$queryEmail= "select  id from user_login WHERE email= '$email'";
	$result = mysqli_query($con, $queryEmail) or die('Cannot fetch data from database. '.mysqli_error($con));
	if(mysqli_num_rows($result) > 0) {
	while($user= mysqli_fetch_assoc($result)) {
		$user_id= $user['id'];

	}
}
echo "<a href='mijnBooking.php?user=$user_id'>mijn_bookingen</a>"

?>

<!DOCTYPE html>
<html>
<head>
	<title>booking page</title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">
		<link href="css/mdb.min.css" rel="stylesheet">
</head>
<body>
	<div class="header text-center">
		<h2>booking Page</h2>
		<p> <a href="logout.php?logout='1'" style="color: red;">logout</a> </p>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<hr>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
		<?php endif ?>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
	</div>


	<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>foto</th>
									<th>title</th>
									<th>startdatum</th>
									<th>einddatum</th>
									<th>presentator</th>
									<th>beschikbaar</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
									// Plaats hier de code voor het ophalen van de gebruikers uit de database. 
									$query = "SELECT * FROM `events`";
									$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
									if(mysqli_num_rows($result) > 0) {

	
									while($event= mysqli_fetch_assoc($result)) {
									echo '<tr>';
									echo '<td>'. "<img src=' " . $event['foto'] . "' width='100' height='100'>". '</td>';
									echo '<td>' . $event['title']   . '</td>';
									echo '<td>' . $event['startdatum']  . '</td>';
									echo '<td>' . $event['einddatum']   . '</td>';
									echo '<td>' . $event['presentator']  . '</td>';
									$aantalplaatsen= intval ($event['aantalplaatsen']);
									$aanmeldingen= intval ($event['aanmeldingen']);
							
									echo '<td>' . strval($aantalplaatsen-$aanmeldingen)  . '</td>';
									$today= date("Y-m-d");
									$startdatum=$event['startdatum'];
								
									if(($aanmeldingen >= $aantalplaatsen)||($startdatum<$today)){
				

										echo '<td><a href="config/actions.php?booking='.$event['id'] .'&user_id='. $user_id  .'" class="btn btn-sm btn-danger disabled " >booking</a></td>';
										
									}
									else{
										echo '<td><a href="config/actions.php?booking='.$event['id'] .'&user_id='. $user_id  .'" class="btn btn-sm btn-danger">booking</a></td>';

									}
								
									
									echo '</tr>';
									}
								}
								
							
									mysqli_free_result($result);
									mysqli_close($con);
								?>
							</tbody>
						</table>
					</div>
				
		
		
</body>
</html>
