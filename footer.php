<footer>
	<?php

			if(isset($_SESSION['login']))
				{ ?>

					<section id="footermenu">

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
									
									<section id="footermenu">
										<a href="index.php?pg=1">Page principale</a><br>
										<a href="connexion.php">Connexion</a><br>
										<a href="inscription.php">Inscription</a><br>
									</section>

									<?php 
								}
								?>

					</section>  

					<section id="logo">
						<a href="index.php"><img id="sardinelogo" src="img/sardine.png"></a>
					</section>

					<section id="sectionReseaux">
					<a href="">	<img class="reseaux" src="img/fb.png"></a>
					<a href=""><img class="reseaux" src="img/twitter.png"></a>
					</section>

							</footer>