<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
	  <a class="navbar-brand" href="index.php">Home</a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<?php if (isset($_SESSION["user"])) { /* glyphicon = petites icones = lourd = <span> */?>
			<li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nom"] ." " .$_SESSION["prenom"]; ?></a></li> 
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Se Déconnecter</a></li>
		<?php }else{ ?>
			<li><a href="Formulaire.php"><span class="glyphicon glyphicon-user"></span> Sinscrire</a></li>
			<li><a href="Autentification.php"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>
		<?php } ?>
		</ul>
	</div>
  </div>
</nav>