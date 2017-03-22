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
<?php include 'navbar.php'; ?>
<body style="margin-top:60px;">
	<?php
	include('connectionbdd.php');
		if(isset($_POST["type"])){
			$rq1 = $dbh->query("INSERT INTO lotprod (annee, type, qte, calibre, idVerger) VALUES ('".date('Y')."', '".$_POST['type']."', ".$_POST['quantite'].", '".$_POST['calibre']."', 1)");
			$rq3 = $dbh->query("SELECT * FROM lotprod WHERE type='".$_POST['type']."' AND qte=".$_POST['quantite']." AND calibre ='".$_POST['calibre']."'");
			$result3 = $rq3->fetch();
			$rq4 = $dbh->query("INSERT INTO commande (date, idCli, idLP) VALUES ('".date('Y-m-d')."', ".$_SESSION["user"].", ".$result3['id'].")");
			header('Location: profil.php');
		}
	
?>
	<div class="container">
	<form method="post" action="commande.php">
	<div class="form-group">
	<label for="mdp">Type :</label>
		<input type="text" class="form-control" name="type" id="type" required>
	</div>
	<div class="form-group">
	<label for="mdp">Quantité :</label>
		<input type="text" class="form-control" name="quantite" id="quantite" required>
	</div>
	<div class="form-group">
	<label for="mdp">Calibre :</label>
		<input type="text" class="form-control" name="calibre" id="calibre" required>
	</div>
		<input class="btn btn-default" style="margin-top:12px" type="submit" value="Passer la commande">
	</form>
	</div>


</body>
</html>
