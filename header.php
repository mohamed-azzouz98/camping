<header>

<?php

	session_start();

	if(isset($_SESSION['login']))
	{ ?>
		<section id="topofheader">
		<a href="index.php"><img id="sardinelogo" src="img/sardine.png"></a>
		<h1 id="h1titre">Bienvenue au camping " Les Happy Sardines " !</h1>
		</section>
		<section id="headermenu">
			
			<a href="index.php?pg=1">Page principale</a><br>
			<a href="planning.php">Planning</a><br>
			<a href="profil.php">Profil</a><br>
			<a href="deconnexion">Déconnexion</a><br>
		

		<?php

		if($_SESSION['login'] == 'admin')
		{ ?>
				<a href="admin.php">Page admin</a><br>
		</section><?php }
		}
		else
		{ ?>
			<section id="topofheader">
		<a href="index.php"><img id="sardinelogo" src="img/sardine.png"></a>
		<h1 id="h1titre">Bienvenue au camping " Les Happy Sardines " !</h1>
		</section>
		<section id="headermenu">
			<a href="index.php?pg=1">Page principale</a><br>
				<a href="connexion.php">Connexion</a><br>
				<a href="inscription.php">Inscription</a><br>
			</section>
			
		<?php 
		}
?>

		</section>

</header>