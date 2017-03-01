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
<?php if (isset($_SESSION["user"])) {
include 'navbar.php'; 
$conn= new mysqli("localhost","root","","ntmppe");
		if ($conn->connect_error) {	
			die("Connection failed: " . $conn->connect_error);
		} else{
		$sql = "SELECT * FROM producteur WHERE id=" .$_SESSION["user"];
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$sql = "SELECT * FROM adherent WHERE idProd=" .$_SESSION["user"];
		$result=$conn->query($sql);
		$row2=$result->fetch_assoc();
		$sql = "SELECT * FROM certification WHERE idProd=" .$_SESSION["user"];
		$result=$conn->query($sql);
} } else {
	header('Location:index.php');
}

?>
<body>
	<div class="container" style="margin-top:50px;">
		<table class="table table-hover">
		<thead>
			<tr><th><h1>Profil</h1></th><th></th></tr>
		</thead>
		<tbody style="width:75%">
		<tr><td>Nom:</td><td><?php echo $_SESSION["nom"];?></td></tr>
		<tr><td>Pr&eacute;nom:</td><td><?php echo $_SESSION["prenom"];?></td></tr>
		<tr><td>Adresse:</td><td><?php echo $row["adresse"]; ?></td></tr>
		<tr><td>Nom du responsable:</td><td><?php echo $row["nomResp"]; ?></td></tr>
		<tr><td>Pr&eacute;nom du responsable:</td><td><?php echo $row["prenomResp"]; ?></td></tr>
		<tr><td>Date d'inscription:</td><td><?php echo $row2["dateI"];?></td></tr>
		</tbody>
		</table>
		<h1>Certifications</h1>
		<table class="table table-hover">
		<br>
		<thead>
			<tr><th>Code Certification</th><th>Libell&eacute; Certification</th></tr>
		</thead>
		<tbody>
		<?php while ($row3 = $result->fetch_assoc()) { ?>
		<tr><td><?php echo $row3["codeC"]; ?></td><td><?php echo $row3["libC"]; ?></td></tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</body>
</html>