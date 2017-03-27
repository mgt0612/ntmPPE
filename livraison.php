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
	include 'navbar.php';
	include 'connectionbdd.php';
	
	$rq1 = $dbh->query("SELECT * FROM verger WHERE idProd=".$_SESSION['user']);
	
	
	if(isset($_POST['verger'])){
		$rq2 = $dbh->query("SELECT * FROM verger WHERE idProd=".$_SESSION['user']." AND id=".$_POST['verger']);
		$donnees2=$rq2->fetch();
		$rq3 = $dbh->query("INSERT INTO livraison (date, type, qte, idVerger) VALUES ('".date('Y-m-d')."', '".$_POST['type']."',  ".$_POST['qte'].", ".$_POST['verger'].")");
		
		$i=3;
		while($_POST['qte']%$i!==0){
			$i++;
		}
		
		$petit = $_POST['qte']/$i;
		$x = $_POST['qte']-$petit;
		
		$y = $x/2;
		
		if(is_float($y)){
			$moyen = floor($y);
			$grand = ceil($y);
		}else{
			$moyen=$x/2;
			$grand=$x/2;
		}
		
		$rq4 = $dbh->query("INSERT INTO lotprod (annee, qte, calibre, idVerger) VALUES ('".date('Y')."', '".$petit."',  'petit', ".$_POST['verger'].")");
		$rq5 = $dbh->query("INSERT INTO lotprod (annee, qte, calibre, idVerger) VALUES ('".date('Y')."', '".$moyen."',  'moyen', ".$_POST['verger'].")");
		$rq6 = $dbh->query("INSERT INTO lotprod (annee, qte, calibre, idVerger) VALUES ('".date('Y')."', '".$grand."',  'grand', ".$_POST['verger'].")");
		
		header('Location: profil.php');
	}
	
	
	?>
	
<body style="margin-top:50px;">

<br />
	<div class="container">
	<form method="post" action="livraison.php" id="livraison">
	<div class="form-group">
	<label for="mdp">Verger :</label>
		<select class="form-control" type="dropdown" name="verger" id="verger" required>
			<?php while($donnees1 = $rq1->fetch()){
				echo "<option value=".$donnees1['id']." >".$donnees1['localisation']."</option>";
			}?>
		</select>
	</div>
	<div class="form-group">
	<label for="mdp">Type :</label>
		<select class="form-control" type="dropdown" name="type" id="type" required>
			<option value="fraiche" >Entière fraiche</option>
			<option value="seche" >Entière sèche</option>
		</select>
	</div>
	<div>
	<label for="mdp" style="margin-top: 7px">Quantité :</label>
      <input type="text" class="form-control" id="qte" name="qte" required>
    </div>
	<br />
		<input class="btn btn-default" style="margin-top:12px" type="submit" value="Envoyer le bon de livraison">
	</form>
	</div>	







</body>

</html>