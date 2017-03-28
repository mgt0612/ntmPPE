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

if (isset($_POST["formnom"])) {

		include 'connectionbdd.php';
		
		$rq6 = $dbh->query("UPDATE user SET nom='".$_POST["formnom"]."' WHERE id=" .$_SESSION["user"]);
		$rq7 = $dbh->query("UPDATE user SET prenom='".$_POST["formprenom"]."' WHERE id=" .$_SESSION["user"]);
		$rq8 = $dbh->query("UPDATE user SET adresse='".$_POST["formadresse"]."' WHERE id=" .$_SESSION["user"]);
		$rq9 = $dbh->query("UPDATE user SET tel='".$_POST["formtel"]."' WHERE id=" .$_SESSION["user"]);
		$rq10 = $dbh->query("UPDATE user SET nomrespprod='".$_POST["formnomresp"]."' WHERE id=" .$_SESSION["user"]);
		$rq11 = $dbh->query("UPDATE user SET prenomrespprod='".$_POST["formprenomresp"]."' WHERE id=" .$_SESSION["user"]);
		$rq12 = $dbh->query("UPDATE user SET role='".$_POST["formrole"]."' WHERE id=" .$_SESSION["user"]);		
		
		$_SESSION["nom"] = $_POST["formnom"];
		$_SESSION["prenom"] = $_POST["formprenom"]; 
		$_SESSION["role"] = $_POST["formrole"];
		
		}
			
		if(isset($_SESSION["user"])){
			include 'navbar.php'; 
			include 'connectionbdd.php';
			$rq1 = $dbh->query("SELECT * FROM user WHERE id=" .$_SESSION["user"]);
			$result1 = $rq1->fetch();
			
			$rq2 = $dbh->query("SELECT * FROM adherent WHERE idProd=" .$_SESSION["user"]);
			$result2 = $rq2->fetch();
			
			$rq3 = $dbh->query("SELECT * FROM certification WHERE idProd=" .$_SESSION["user"]);
			$result3 = $rq3->fetch();
			
			$rq4 = $dbh->query("SELECT * FROM commande WHERE idCli=".$_SESSION['user']); //normal qu'il y en ai 2 pareil, nécessaire au traitement
			$rq5 = $dbh->query("SELECT * FROM commande WHERE idCli=".$_SESSION['user']);
			
			$rq6 = $dbh->query("SELECT * FROM verger WHERE idProd=".$_SESSION['user']); //same
			$rq7 = $dbh->query("SELECT * FROM verger WHERE idProd=".$_SESSION['user']);
			
			$rq8 = $dbh->query("SELECT * FROM livraison, verger WHERE verger.idProd=".$_SESSION['user']." AND livraison.idVerger=verger.id"); //pareil
			$rq9 = $dbh->query("SELECT * FROM livraison, verger WHERE verger.idProd=".$_SESSION['user']." AND livraison.idVerger=verger.id");
			
			
		}

		if(isset($_GET['SVid'])){
			$rq8 = $dbh->query("DELETE FROM verger WHERE id=".$_GET['SVid']." AND idProd=".$_SESSION['user']);
			header('Location: profil.php');
		}
		

	

	

?>
<body>
	<div class="container" style="margin-top:50px;">
		<table class="table table-hover" id="tableProfil" width="650px">
		<thead>
			<tr><th><h1>Profil</h1></th><th></th></tr>
		</thead>
		<tbody style="width:75%">
		<tr id="nom"><td>Nom:</td><td style="text-align : center;" id="setNom" onclick="modif('setNom');"><?php echo $result1["nom"];?></td></tr>
		<tr id="prenom"><td>Pr&eacute;nom:</td><td style="text-align : center;" id="setPrenom" onclick="modif('setPrenom'); "><?php echo $result1["prenom"];?></td></tr>
		<tr id="adresse"><td>Adresse:</td><td style="text-align : center;" id="setAdresse" onclick="modif('setAdresse');"><?php echo $result1["adresse"]; ?></td></tr>
		<tr id="tel"><td>Tel:</td><td style="text-align : center;" id="setTel" onclick="modif('setTel');"><?php echo $result1["tel"]; ?></td></tr>
		<tr id="nomresp"><td>Nom du responsable:</td><td style="text-align : center;" id="setNomresp" onclick="modif('setNomresp');"><?php echo $result1["nomrespprod"]; ?></td></tr>
		<tr id="prenomresp"><td>Pr&eacute;nom du responsable:</td><td style="text-align : center;" id="setPrenomresp" onclick="modif('setPrenomresp');"><?php echo $result1["prenomrespprod"]; ?></td></tr>
		<tr id="role"><td>Rôle</td><td style="text-align : center;" id="setRole" onclick="modif('setRole');"><?php echo $result1['role']; ?></td></tr>
		<tr id="date"><td>Date d'inscription:</td><td style="text-align : center;" id="setDate" ><?php echo $result2["dateI"];?></td></tr>
		</tbody>
		<br>
		<tr><td></td><td><button type="button" class="btn btn-info btn-block" onclick="envoiInfos();">Mettre à jour les informations</button></td></tr>
		<br>
		</table>
		<br />
		<?php if(isset($result3['codeC'])) { ?>
		<h1>Certifications</h1>
		<table class="table table-hover">
		<br>
		<thead>
			<tr><th>Code Certification</th><th>Libell&eacute; Certification</th></tr>
		</thead>
		<tbody>
		<tr><td><?php echo $result3["codeC"]; ?></td><td><?php echo $result3["libC"]; ?></td></tr>
		<?php } ?>
		</tbody>
		</table>
		<br />
		<?php $var5 = $rq5->fetch(); if(isset($var5['id'])){?>
		<h1>Commandes</h1>
		<table class="table table-hover">
		<br>
		<thead>
			<tr><th>ID Commande</th><th>Date</th><th>ID Lot de production</th></tr>
		</thead>
		<tbody>
		<?php while($donnees4=$rq4->fetch()){?>
			
			<tr><td><?php echo $donnees4["id"]; ?></td><td><?php echo $donnees4["date"]; ?></td><td><?php echo $donnees4["idLP"];?> </td></tr> 

		<?php } ?>
		</tbody>
		<?php } ?>
		</table>
		<?php $var6 = $rq6->fetch(); if(isset($var6['id'])){?>
		<h1>Vergers</h1>
		<table class="table table-hover">
		<br>
		<thead>
			<tr><th>ID Verger</th><th>Variété</th><th>Superficie</th><th>Densité</th><th>Localisation</th></tr>
		</thead>
		<tbody>
		<?php while($donnees6=$rq7->fetch()){?>
			
			<tr><td><?php echo $donnees6["id"]; ?></td><td><?php echo $donnees6["variete"]; ?></td><td><?php echo $donnees6["superficie"];?> </td><td><?php echo $donnees6["densite"];?> </td><td><?php echo $donnees6["localisation"];?> </td><td><span type="button" class="glyphicon glyphicon-remove" onclick="supprVerger(<?php echo $donnees6['id'] ?>, <?php echo $_SESSION['user'] ?>)"></span></td></tr> 

		<?php } ?>
		</tbody>
		<?php } ?>
		</table>
		<br />
		<?php $var8 = $rq8->fetch(); if(isset($var8['id'])){?>
		<h1>Livraisons effectuées</h1>
		<table class="table table-hover">
		<br>
		<thead>
			<tr><th>ID Livraison</th><th>Date</th><th>Type</th><th>Quantité</th><th>ID Verger</th></tr>
		</thead>
		<tbody>
		<?php while($donnees9=$rq9->fetch()){?>
			
			<tr><td><?php echo $donnees9["idLivraison"]; ?></td><td><?php echo $donnees9["date"]; ?></td><td><?php echo $donnees9["type"];?> </td><td><?php echo $donnees9["qte"];?> </td><td><?php echo $donnees9["idVerger"];?> </td></tr> 

		<?php } ?>
		</tbody>
		<?php } ?>
		
		</table>
		
		
	</div>
	
	
	
	
	
	<form id="modifProfil" class="form-horizontal" method="post" style="visibility : hidden;">
	  <div>
		<input type="text" id="formnom" name="formnom" required>
	  </div>
	  <div>
		<input type="text" id="formprenom" name="formprenom" required>
	  </div>
	  <div>
		<input type="text" id="formadresse" name="formadresse" required>
	  </div>
	  <div>
		<input type="text" id="formtel" name="formtel" required>
	  </div>
	  <div>
		<input type="text" id="formnomresp" name="formnomresp" required>
	  </div>
	  <div>
		<input type="text" id="formprenomrespprod" name="formprenomresp" required> 
	  </div>
	  <div>
		<input type="text" id="formrole" name="formrole" required>
	  </div>
	  <div>
		<input type="text" id="formdate" name="formdate" required>
	  </div>
	</form>
	
	<form id="supprimerVerger" class="form-horizontal" method="get" style="visibility : hidden;">
	  <div>
		<input type="text" id="SVid" name="SVid" required>
	  </div>
	  <div>
		<input type="text" id="SVidProd" name="SVidProd" required>
	  </div>
	</form>
	
</body>

<script>

	function modif(field){
		
		var tabFields = new Array("nom", "prenom", "adresse", "tel", "nomresp", "prenomresp", "role", "date");
		var res = new Array();
		
		for(i=0; i<7; i++){
			taille = document.getElementById(tabFields[i]).childElementCount;
			res.push(taille);
			//console.log(res[i]);
		}
		cool = "oui";
		for(i=0; i<7; i++){
			if(res[i]!==2){
			cool = "non";
			}
		}
		
		if(cool==="oui"){
			
			parentField = document.getElementById(field).parentNode.id;
			console.log(parentField);
			
			laCase = document.getElementById(field);
			valueCase = laCase.innerHTML;

			laLigne = document.getElementById(parentField);
			
			laCase.remove();
			
			lcT = laCase.id;
			console.log("-- SUPPRESION CASE ACTUELLE, id : "+lcT);
			
			ma_case = document.createElement('td');
			ma_case2 = document.createElement('td');
			ma_case.setAttribute("align", "center");
			ma_case.setAttribute("width", "19");
			
			mon_check_btn = document.createElement('BUTTON');
			mon_check_btn.setAttribute('class', 'btn btn-info');
			
			
			mon_input = document.createElement("INPUT");
			mon_input.setAttribute("type", "text");
			mon_input.setAttribute("value", valueCase);
			
			mon_check_btn.addEventListener("click", function(){
				val = mon_input.value;
				new_case = document.createElement('td');
				new_case.setAttribute("align", "center");
				new_case.setAttribute("id", field);
				new_case.addEventListener("click", function(){
					la_ligne = laLigne.id;
					modif(field, la_ligne);
				});
				ma_case.remove();
				console.log("-- suppression ma_case");
				ma_case2.remove();
				console.log("-- suppression ma_case2");
				laLigne.appendChild(new_case);
				ncT = new_case.id;
				console.log("intégraton de new case, id : "+ncT);
				new_case.innerHTML = val;
			});
			ma_case.appendChild(mon_input);
			inpT = mon_input.id;
			console.log("intégration input, id : "+inpT);
			
			ma_case2.appendChild(mon_check_btn);
			mcbT = mon_check_btn.id
			console.log("intégration check_btn, id : "+mcbT);
			laLigne.appendChild(ma_case);
			mcT = ma_case.id;
			console.log("intégration ma_case, id : "+mcT);
			laLigne.appendChild(ma_case2);
			mc2T = ma_case2.id;
			console.log("intégration ma_case2, id : "+mc2T);
			
		}
	}
	
	
	function envoiInfos(){
		
		setNom = document.getElementById("setNom").innerHTML;
		setPrenom = document.getElementById("setPrenom").innerHTML;
		setAdresse = document.getElementById("setAdresse").innerHTML;
		setTel = document.getElementById("setTel").innerHTML;
		setNomresp = document.getElementById("setNomresp").innerHTML;
		setPrenomresp = document.getElementById("setPrenomresp").innerHTML;
		setRole = document.getElementById("setRole").innerHTML;
		setDate = document.getElementById("setDate").innerHTML;
		
		formnom = document.getElementById("formnom");
		formnom.setAttribute("value", setNom);
		formprenom = document.getElementById("formprenom");
		formprenom.setAttribute("value", setPrenom);
		formadresse = document.getElementById("formadresse");
		formadresse.setAttribute("value", setAdresse);
		formtel = document.getElementById("formtel");
		formtel.setAttribute("value", setTel);
		formnomresp = document.getElementById("formnomresp");
		formnomresp.setAttribute("value", setNomresp);
		formprenomrespprod = document.getElementById("formprenomrespprod");
		formprenomrespprod.setAttribute("value", setPrenomresp);
		formrole = document.getElementById("formrole");
		formrole.setAttribute("value", setRole);
		formdate = document.getElementById("formdate");
		formdate.setAttribute("value", setDate);
		
		
		
		modifProfil.submit();
		
	}
	
	function supprVerger(idVerger, idProd){
		SVid.setAttribute("value", idVerger);
		SVidProd.setAttribute("value", idProd);
		
		supprimerVerger.submit();
	}
	
	

</script>

</html>