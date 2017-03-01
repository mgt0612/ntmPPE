<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ppe Projet</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
	include 'navbar.php'; ?>
<body style="margin-top:50px;">
<?php
	include 'navbar.php';
	if(isset($_POST["nomproducteur"])){                               //isset = est-ce que cette variable existe ?
	if($_POST["mdp"] == $_POST["mdpC"]) {
		$conn= new mysqli("localhost","root","","ntmppe");
		if ($conn->connect_error) {									 // on check si la connection se fait
			die("Connection failed: " . $conn->connect_error);
		} else{
		$sql = "INSERT INTO producteur(nom,prenom,adresse,nomResp,prenomResp,mdp) VALUES('" .$_POST['nomproducteur'] ."','".$_POST['prenomproducteur']."','".$_POST['adressesociete']."','".$_POST['nomrespprod']."','".$_POST['prenomrespprod'] ."','" .sha1($_POST["mdp"]) ."')";																	// ATTENTION AUX TYPES DES VARIABLES  	
		if ($conn->query($sql) === TRUE) {						//si la requête a été envoyée (=== implique boolean)
			$idP = mysqli_insert_id($conn);
			$sql2 = "INSERT INTO adherent(dateI,idProd) VALUES('" .date('Y-m-d') ."','" .$idP ."')";
			$conn->query($sql2); 
			if ($_POST["labagribio"] == "on") {
			$idA = mysqli_insert_id($conn);
			$sql3 = "INSERT INTO certification(codeC,libC,idAdh,idProd) VALUES('LabAgriBio','Label Agriculture Biologique',"  .$idA ."," .$idP .")";
			$conn->query($sql3); 
			}?>
			<div class="alert alert-success alert-dismissible" style="margin-top:-20px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Succ&egrave;s!</strong> Producteur ajout&eacute; aux adh&eacute;rents.</div>				<!--on affiche ça-->
		<?php } else {											// sinon
			echo "Error: " . $sql . "<br>" . $conn->error;		// on affiche le message d'erreur
		}
		}
	$conn->close();
	}
	else { ?>
		 <div class="alert alert-warning alert-dismissible" style="margin-top:-20px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur:</strong> Les mots de passe ne correspondent pas.</div>
	<?php }
	}
	?>
<div class="jumbotron text-center " style="margin-top:-20px;">
  <h1>AGRUR</h1>
  <p>La simplicité</p>
</div>
<div class="container">
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label class=" control-label" for="nomproducteur">Nom du producteur :</label>
    <div>
      <input type="text" class="form-control" id="nomproducteur" name="nomproducteur" required>
    </div>
  </div>
  <div class="form-group">
    <label class=" control-label" for="prenomproducteur">Prénom du producteur :</label>
    <div>
      <input type="text" class="form-control" id="prenomproducteur"name="prenomproducteur" required>
    </div>
  </div>
  <div class="form-group">
    <label class=" control-label" for="adressesociete">Adresse de la société :</label>
    <div >
      <input type="text" class="form-control" id="adressesociete"name="adressesociete" required>
    </div>
  </div>
  <div class="form-group">
    <label class=" control-label" for="nomrespprod">Nom du reponsable de production:</label>
    <div >
	    <input type="text" class="form-control" id="nomrespprod" name="nomrespprod" required>
	</div>
  </div>
  <div class="form-group">
	<label class="control-label" for="prenomrespprod">Prénom du reponsable de production:</label>
    <div>
      <input type="text" class="form-control" id="prenomrespprod" name="prenomrespprod" required>
    </div>
  </div>
  <div class="form-group">
  <label class="control-label" for="mdp">Mot de passe : </label>
	<input class="form-control"type="password" id="mdp" name="mdp" required>
  </div>
  <div class="form-group">
  <label class="control-label" for="mdpC">Vérification mot de passe : </label>
	<input type="password" class="form-control" id="mdpC" name="mdpC" required>
  </div>
  <div class="form-group">
  <div class="checkbox">
    <label for="labagribio" ><input id="labagribio" name="labagribio" type="checkbox" value="on"> Label Agriculture Biologique</label>
  </div>
  </div>
  <input style="margin-bottom:20px;" class="btn btn-default" type="submit" value="Envoyer le formulaire">
    
   </form>
  </div>
   </body>
 </html>