<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Film: Django Unchained</title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
	<main>
	<?php
		// connexion et choix de la BD
		try {
			$user='root';
			$pass='root';
			$dbh = new PDO('mysql:host=localhost;dbname=film', $user, $pass);
			//$dbh = null;
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	?>
		<header>
			<ul class="navbar">
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Films</a>
				<div class="dropdown-content">
				<?php	
					foreach($dbh->query('SELECT titre FROM `film` order by titre') as $row) {
						print('<a href="film.php">' . $row['titre']  . '</a>');
					}
					//$dbh = null;
				?>
				</div>
			  </li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Réalisateurs</a>
				<div class="dropdown-content">
				<?php	
					foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' order by personne.nom, personne.prenom') as $row) {
						print('<a href="realisateur.php">' . $row['prenom'] . ' ' . $row['nom'] . '</a>');
					}
					//$dbh = null;
				?>
				</div>
			  </li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Acteurs</a>
				<div class="dropdown-content">
				<?php	
					foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Acteur\' order by personne.nom, personne.prenom') as $row) {
						print('<a>' . $row['prenom'] . ' ' . $row['nom'] . '</a>');
					}
					$dbh = null;
				?>
				</div>
			  </li>
			</ul>
		</header>
		<section>
			<main>
				<h1>Présentation</h1>
				<p>Ce site à pour but de présenter différents films dit culte. Ainsi que leurs acteurs et réalisateurs</p>
			</main>
		</section>
		<footer>
			<address>Auteur: Anthony Cargnino</address>
		</footer>
	</main>	
	</body>
</html>