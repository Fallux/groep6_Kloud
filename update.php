<?php
	// Hier komt de code te staan die ervoor zorgt dat er een database-connectie is
	
	// Hier komt de code te staan die de gebruiker ophaalt uit de database die geupdate gaat worden 
	require 'config/config.php';

	if( isset($_GET['upd']) ) {
		$id     = $_GET['upd'];
		$query  = "SELECT * FROM `events` WHERE id=$id";
		$result = mysqli_query($con, $query);
		$user   = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($con);
	   }
	   



?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='description' content='Basic loginsystem'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv='x-ua-compatible' content='ie=edge'>
	<link href='css/bootstrap.min.css' rel='stylesheet'>
	<link href="css/mdb.min.css" rel="stylesheet">
	<title>Basic Login System</title>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<div class='col-lg-4 col-lg-offset-4'>
					<h3>Update Data</h3>
					<hr/>
					<form name='update' id='update' action='config/actions.php?id= <?php echo $user['id'] ?>' method='post'>
						<div class='form-group'>
							<label for='foto'>foto</label>
							<input value='<?php echo $user['foto']; ?>' name='foto' id='foto' type='text' class='form-control' placeholder='foto' />
						</div>
						<div class='form-group'>
							<label for='title'>title</label>
							<input value='<?php echo $user['title'] ?>' name='title' id='title' type='text' class='form-control' placeholder='title' />
						</div>
						<div class='form-group'>
							<label for='startdatum'>startdatum</label>
							<input value='<?php echo $user['startdatum'] ?>' name='startdatum' id='startdatum' type='text' class='form-control' placeholder='startdatum' />
						</div>
						<div class='form-group'>
							<label for='einddatum'>einddatum</label>
							<input value= '<?php echo $user['einddatum'] ?>' name='einddatum' id='einddatum' type='text' class='form-control' placeholder='einddatum' />
						</div>
						<div class='form-group'>
							<label for='aantalplaatsen'>aantalplaatsen</label>
							<input  value=' <?php echo $user['aantalplaatsen'] ?>' name='aantalplaatsen' id='aantalplaatsen' type='aantalplaatsen' class='form-control' placeholder='Enter new aantalplaatsen' />
						</div>
						<div class='form-group'>
							<label for='aanmeldingen'>aanmeldingen</label>
							<input  value=' <?php echo $user['aanmeldingen'] ?>' name='aanmeldingen' id='aanmeldingen' type='pris' class='form-control' placeholder='Enter new aantalplaatsen' />
						</div>
						<div class='form-group'>
							<button name='btnupdate' id='update' class='btn btn-primary btn-block'>Update</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>