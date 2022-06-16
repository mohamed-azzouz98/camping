<html>

	<head>
		<title>Page principale</title>
		<link rel="stylesheet" type="text/css" href="camping.css">
	</head>
	<body id="bodyindex">
		<?php include('header.php'); ?>
		<main id="mainindex">
	 		
			 <p><h1 class="textintrotitre">Bienvenue au Camping "<i> Les Happy Sardines </i>" !! <h1>
		<h2 class="textintro">Besoin de vacances ? besoins d'aventures ? <br>
		Vous êtes au bon endroit ! 
		Les Pins, le Maquis ou encore la Plage... En camping-car ou en tente ? <br>
		C'est selon votre bon vouloir ! <br> Des activités ? des moments détentes ou découvertes ? <br>
		Vous êtes au bon endroit !
			</h2></p>


	 		<table class="tableindex">
	 			<tr >
	 				<td></td>
	 				<td >La Plage</td>
	 				<td>Les Pins</td>
	 				<td>Le Maquis</td>
	 			</tr>
	 			<tr>
	 				<td>Camping-car</td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=plage&amp;habitat=cpgcar">Réserver</a></td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=pins&amp;habitat=cpgcar">Réserver</a></td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=maquis&amp;habitat=cpgcar">Réserver</a></td>

	 			</tr>
	 			<tr>
	 				<td>Tente</td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=plage&amp;habitat=tente">Réserver</a></td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=pins&amp;habitat=tente">Réserver</a></td>
	 				<td class="tableindex"><a href="reservations.php?emplacement=maquis&amp;habitat=tente">Réserver</a></td>
	 			</tr>
	 		</table>



		</main>
		<?php include('footer.php'); ?>
	</body>


</html>