<?php session_start(); ?>
<<<<<<< HEAD
<!DOCTYPE html><!--NADONNNNNNN-->
<html lang="en">
=======
<!DOCTYPE html>
<html lang="en"> <!--bite-->
>>>>>>> 8cf8ddff06b235284a317f102bab652ad3ac4a72
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
	if (isset($_POST["login"])) {
		$conn = new mysqli("localhost","root","","ntmppe");
		if ($conn->connect_error) {									 // on check si la connection se fait
			die("Connection failed: " . $conn->connect_error);
		} else{
			$SQL = "SELECT * FROM producteur WHERE nom='" .$_POST["login"] ."' AND mdp='" .sha1($_POST["mdp"]) ."'";
			$result = $conn->query($SQL);
			if ($result->num_rows>0) { // SI il y a au moins une ligne de résultat
				$row=$result->fetch_assoc(); //range sous forme de tableau
				$_SESSION["user"] = $row["id"]; //associe avec la variable de session
				$_SESSION["nom"] = $row["nom"];
				$_SESSION["prenom"] = $row["prenom"]; ?>
				<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Succ&egrave;s!</strong> Connexion r&eacute;ussie</div>'; <!--&eacute = é en utf8-->
			<?php 
				$conn->close();
				header('Location:index.php');
			} else { ?>
				<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur:</strong> Le login ou le mot de passe est incorrect.</div>
			<?php }
		}
		$conn->close();
	}
?>
<div class="container">
<form method="post" action="Autentification.php">
<div class="form-group">
  <label for="login">Votre login :</label>
  <input type="text" class="form-control" name="login" id="login" required>
</div>
<div class="form-group">
  <label for="mdp">Mot de passe:</label>
  <input type="password" class="form-control" name="mdp" id="mdp" required>
</div>
<input class="btn btn-default" type="submit" value="Connexion">
</form>
</div>
</body>
</html>