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
	if (isset($_POST["login"])) {
		include('connectionbdd.php');
			$rq1 = $dbh->query("SELECT * FROM user WHERE nom='" .$_POST["login"] ."' AND mdp='" .sha1($_POST["mdp"]) ."'");
			$result = $rq1->fetch();
			if (isset($result['nom'])) { // SI il y a au moins une ligne de résultat
				$_SESSION["user"] = $result["id"]; //associe avec la variable de session
				$_SESSION["nom"] = $result["nom"];
				$_SESSION["prenom"] = $result["prenom"]; 
				$_SESSION["role"] = $result["role"]; ?>
				
				<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Succ&egrave;s!</strong> Connexion r&eacute;ussie</div>'; <!--&eacute = é en utf8-->
			<?php
				header('Location:index.php');
			} else { ?>
				<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur:</strong> Le login ou le mot de passe est incorrect.</div>
			<?php }
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