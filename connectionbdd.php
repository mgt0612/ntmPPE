<?php                                                               //Connection a la base de données en localhost

	$dbInfo = 'mysql:host=localhost;dbname=ntmppe';
	$dbUser = 'root';
	$dbPassword = '';
		try {
			$dbh = new PDO($dbInfo, $dbUser, $dbPassword);
		} catch (PDOException $e) {
			echo 'Connexion échouée : ' . $e->getMessage();
		}
?>