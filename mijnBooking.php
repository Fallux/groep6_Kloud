<?php
require 'config/config.php';
if( isset($_GET['user']) ) {
	$id = $_GET['user'];
	

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">  
        <link href="css/mdb.min.css" rel="stylesheet">

</head>
</head>
<body>
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
                    $query = "SELECT * FROM events RIGHT JOIN user_events ON events.id =events_id WHERE user_events.user_id=".$id;
                    $result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
                    if(mysqli_num_rows($result) > 0) {


                    while($event= mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>'. "<img src=' " . $event['foto'] . "' width='100' height='100'>". '</td>';
                    echo '<td>' . $event['title']   . '</td>';
                    echo '<td>' . $event['startdatum']  . '</td>';
                    echo '<td>' . $event['einddatum']   . '</td>';
                    echo '<td>' . $event['presentator']  . '</td>';
                    $aantalplaatsen= intval ($event['aantalplaatsen']);
                    $aanmeldingen= intval ($event['aanmeldingen']);
                    echo '<td>' . strval($aantalplaatsen-$aanmeldingen)  . '</td>';
                
                
                  
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