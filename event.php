
<?php
require 'config/config.php';


?>



<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='description' content='Basic loginsystem'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv='x-ua-compatible' content='ie=edge'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">
	<title>Basic Login System</title>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12 col-lg-offset-2'>
				<div class='col-lg-12 col-lg-offset-2'>
					<h3>User Data</h3>
					<hr>
					<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>foto</th>
									<th>title</th>
									<th>startdatum</th>
									<th>einddatum</th>
									<th>presentator</th>
									<th>startdatum</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
									// Plaats hier de code voor het ophalen van de gebruikers uit de database. 
									$query = "SELECT * FROM `events`";
									$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
									if(mysqli_num_rows($result) > 0) {

	
									while($user = mysqli_fetch_assoc($result)) {
									echo '<tr>';
									echo '<td>'. "<img src=' " . $user['foto'] . "' width='100' height='100'>". '</td>';
									echo '<td>' . $user['title']   . '</td>';
									echo '<td>' . $user['startdatum']      . '</td>';
									echo '<td>' . $user['einddatum']      . '</td>';
									echo '<td>' . $user['presentator']   . '</td>';
									$aantalplaatsen= intval ($user['aantalplaatsen']);
									$aanmeldingen= intval ($user['aanmeldingen']);
									
									echo '<td>' . strval($aantalplaatsen-$aanmeldingen)  . '</td>';
									// echo '<td>' .(int)($user['aantalplaatsen'])-(int)($user['aanmeldingen']) . '</td>';

									echo '<td><a href="config/actions.php?del='.$user['id'].'" class="btn btn-sm btn-danger">Delete</a></td>';
									echo '<td><a href="update.php?upd='.$user['id'].'" class="btn btn-sm btn-warning">Update</a></td>';
									echo '</tr>';
									}
									}
									mysqli_free_result($result);  
									mysqli_close($con);
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='col-lg-8 col-lg-offset-2'>
				<div class='col-lg-6 col-lg-offset-3'>
					<h3>eventAanmaakenn</h3>
					<hr/>
					<form name='eventAanmaakenn' id='eventAanmaakenn' action=' config/actions.php' method='post'>
						<div class='form-group'>  
							<label for='foto'>foto</label>
							<input name='foto' id='foto' type='text' class='form-control' placeholder='foto-evenementen' required />
						</div>
						<div class='form-group'>
							<label for='title'>title</label>
							<input name='title' id='title' type='text' class='form-control' placeholder='title' required />
						</div>
						<div class='form-group'>
							<label for='startdatum'>startdatum</label>
							<input name='startdatum' id='startdatum' type='date' class='form-control' placeholder='startdatum' required />
						</div>
						<div class='form-group'>
							<label for='presentator'>presentator</label>
							<input name='presentator' id='presentator' type='text' class='form-control' placeholder='presentator' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
						</div>
						<div class='form-group'>
							<label for='einddatum'>einddatum</label>
							<input name='einddatum' id='einddatum' type='date' class='form-control' placeholder='einddatum' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
						</div>
						<div class='form-group'>
							<label for='aantalplaatsen'>aantalplaatsen</label>
							<input name='aantalplaatsen' id='aantalplaatsen' type='number' class='form-control' placeholder='aantalplaatsen' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
						</div>
						<div class='form-group'>
							<label for='aanmeldingen'>aanmeldingen</label>
							<input  value=' <?php echo $user['aanmeldingen'] ?>' name='aanmeldingen' id='aanmeldingen' type='number' class='form-control' placeholder='Enter new startdatum' />
						</div>
						<div class='form-group'>
							<button name='submit' id='submit' class='btn btn-primary btn-block'>aanmaaken</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>