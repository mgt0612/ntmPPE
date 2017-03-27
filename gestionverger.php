<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ppe Projet</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="cssNTM.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
	include 'navbar.php'; 
	include('connectionbdd.php');
		if(isset($_POST["variete"])){
			$rq1 = $dbh->query("INSERT INTO verger (variete, superficie, densite, localisation, idProd) VALUES ('".$_POST['variete']."', ".$_POST['superficie'].", ".$_POST["densite"].", '".$_POST['localisation']."', ".$_SESSION['user'].")");
			header('Location: profil.php');
		}
	
?>
<body style="margin-top:50px;">

	<br />
	<div class="container">
	<form method="post" action="gestionverger.php" id="verger">
	<div class="form-group" style="margin-bottom : 15px">
	<label for="mdp">Variété :</label>
		<select class="form-control" type="dropdown" name="variete" id="variete" required> 
			<option value="Franquette" >Franquette</option>
			<option value="Mayette" >Mayette</option>
			<option value="Parisienne" >Parisienne</option>
		</select>
	</div>
	<div>
		<label for="mdp">Superficie :</label>
		<input type="text" class="form-control" name="superficie" id="superficie" required>
	</div>
	<br />
	<div>
		<label for="mdp">Nombre d'arbres à l'hectare :</label>
		<input type="text" class="form-control" name="densite" id="densite" required>
	</div>
	<br />
	<div>
		<label for="mdp">Localisation :</label>
		<input type="text" class="form-control" name="localisation" id="localisation" required>
	</div>
	<br />
	<br />
	<div>
		<input type="submit" class="btn btn-info btn-block" value="Ajouter un verger">
	</div>
	
	</div>










<body>

</html>