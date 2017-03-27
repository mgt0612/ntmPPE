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

<script>
	function fournirSelecteurs(){
		
		var type = document.getElementById("typeconditionnement").value;
		console.log(type);
		var x = document.getElementById("qte");
		
		switch(type){
			case "Sachet" :
			
				while (x.firstChild) {
					x.removeChild(x.firstChild);
				}
			
				var option1 = document.createElement("option");
				option1.text = "250 g";
				option1.setAttribute("value", 250);
				var option2 = document.createElement("option");
				option2.text = "500 g";
				option2.setAttribute("value", 500);
				var option3 = document.createElement("option");
				option3.text = "1 kg";
				option3.setAttribute("value", 250);
				
				x.add(option1);
				x.add(option2);
				x.add(option3);
				
				break;
				
			case "Filet" :
				
				while (x.firstChild) {
					x.removeChild(x.firstChild);
				}
			
				var option1 = document.createElement("option");
				option1.text = "1 kg";
				option1.setAttribute("value", 1000);
				var option1 = document.createElement("option");
				option1.text = "5 kg";
				option1.setAttribute("value", 5000);
				var option2 = document.createElement("option");
				option2.text = "10 kg";
				option2.setAttribute("value", 10000);
				var option3 = document.createElement("option");
				option3.text = "25 kg";
				option3.setAttribute("value", 25000);
				
				x.add(option1);
				x.add(option2);
				x.add(option3);

				break;
				
			case "Carton" :
				
				while (x.firstChild) {
					x.removeChild(x.firstChild);
				}
			
				var option1 = document.createElement("option");
				option1.text = "10 kg";
				option1.setAttribute("value", 10000);
				
				
				x.add(option1);

				break;
		}
	}

</script>

<?php include 'navbar.php'; ?>
<body style="margin-top:60px;">
	<?php
	include('connectionbdd.php');
		if(isset($_POST["type"])){
			$rq1 = $dbh->query("INSERT INTO lotprod (annee, type, variete, qte, calibre, idVerger) VALUES ('".date('Y')."', '".$_POST['typeconditionnement']."', '".$_POST["type"]."', ".$_POST['qte'].", '".$_POST['calibre']."', 1)");
			$rq3 = $dbh->query("SELECT * FROM lotprod WHERE variete='".$_POST['type']."' AND type='".$_POST['typeconditionnement']."' AND qte=".$_POST['qte']." AND calibre ='".$_POST['calibre']."'");
			$result3 = $rq3->fetch();
			$rq4 = $dbh->query("INSERT INTO commande (date, idCli, idLP) VALUES ('".date('Y-m-d')."', ".$_SESSION["user"].", ".$result3['id'].")");
			header('Location: profil.php');
		}
	
?>
	<br />
	<div class="container">
	<form method="post" action="commande.php" id="com">
	<div class="form-group">
	<label for="mdp">Variété :</label>
		<select class="form-control" type="dropdown" name="type" id="type" required> 
			<option value="Franquette" >Franquette</option>
			<option value="Mayette" >Mayette</option>
			<option value="Parisienne" >Parisienne</option>
		</select>
	</div>
	<div class="form-group">
	<label for="mdp">Type de conditionnement :</label>
		<select class="form-control" type="dropdown" name="typeconditionnement" id="typeconditionnement" onchange="fournirSelecteurs()" required> 
			<option value="Sachet">Sachet</option>
			<option value="Filet">Filet</option>
			<option value="Carton">Carton</option>
		</select>
	</div>
	<div class="form-group">
	<label for="mdp">Quantité :</label>
	<select class="form-control" type="dropdown" name="qte" id="qte" required>
			<option value=250>250 g</option>
			<option value=500>500 g</option>
			<option value=1000>1 kg</option>
	</select>
	</div>
	<div>
	<label for="mdp">Calibre :</label>
		<select class="form-control" type="dropdown" name="calibre" id="calibre" required> 
			<option value="petit">petit</option>
			<option value="moyen">moyen</option>
			<option value="grand">grand</option>
		</select>
	</div>
		<input class="btn btn-default" style="margin-top:32px;" type="submit" value="Passer la commande">
	</form>
	</div>


</body>
</html>
