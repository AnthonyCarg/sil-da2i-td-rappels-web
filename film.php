<!doctype html>
<html class="no-js" lang="en">
	<?php
		require 'Movie.php'; // J'inclus la classe.
		$objet = new Movie; 
	
		// connexion et choix de la BD
		try {
			$user='root';
			$pass='root';
			$dbh = new PDO('mysql:host=localhost;dbname=film', $user, $pass);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	?>
	<head>
		<meta charset="UTF-8">
		<title>Film: <?php	
					foreach($dbh->query('SELECT titre FROM `film`') as $row) {
						print($row['titre']);
					}
				?></title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
	<main>

		<header>
			<ul class="navbar">
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Films</a>
				<div class="dropdown-content">
				<?php	
					foreach($dbh->query('SELECT titre FROM `film` order by titre') as $row) {
						print('<a href="film.php">' . $row['titre']  . '</a>');
					}
				?>
				</div>
			  </li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Réalisateurs</a>
				<div class="dropdown-content">
				<?php
					foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom') as $row) {
						print('<a href="realisateur.php">' . $row['prenom'] . ' ' . $row['nom'] . '</a>');
					}
				?>
				</div>
			  </li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Acteurs</a>
				<div class="dropdown-content">
				<?php	
					foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Acteur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom') as $row) {
						print('<a>' . $row['prenom'] . ' ' . $row['nom'] . '</a>');
					}
				?>
				</div>
			  </li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Gestion</a>
				<div class="dropdown-content">
					<a href="">Ajouter un film</a>
					<a href="">Liste des films</a>
				</div>
			  </li>
			</ul>
		</header>
			<main>
				<section>
					<h1><?php  
							foreach($dbh->query('SELECT titre FROM film WHERE titre = \'Django Unchained\'') as $row) {
								print($row['titre']);
							}
						?></h1>
					<h2>Date de sortie</h2>
						<p>Le film est sortie le <time datetime="2001-05-15T19:00"><?php  
							foreach($dbh->query('SELECT date_de_sortie FROM film WHERE titre = \'Django Unchained\'') as $row) {
								print($row['date_de_sortie']);
							}
						?></time>.</p>
					<h2>Noms des acteurs principaux</h2>
						<ul>
						<?php	
						
							foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.id_film = 1 and film_has_personne.role = \'Acteur\'') as $row) {
								print('<li>' . $row['prenom'] . ' ' . $row['nom'] . '</li>');
							}
						?>
						</ul>
					<h2>Synopsis</h2>
						<p><?php  
							foreach($dbh->query('SELECT synopsis FROM film WHERE titre = \'Django Unchained\'') as $row) {
								print($row['synopsis']);
							}
						?></p>
					<h2>Note</h2>
						<p>Ce film est noté <meter min="0" max="5" value="4.5"><?php  
							foreach($dbh->query('SELECT note FROM film WHERE titre = \'Django Unchained\'') as $row) {
								print($row['note']);
							}
						?></meter>.</p>
					<h2 class="image">Image du film</h2>
						<?php  
							foreach($dbh->query('SELECT photo.chemin, photo.legende FROM `film_has_photo` left join `photo` on photo.id = film_has_photo.id_photo WHERE film_has_photo.id_film = 1') as $row) {
								print('<figure><img class="film" src="'.$row['chemin'].'" alt="'.$row['legende'].'"><figcaption>'.$row['legende'].'</figcaption></figure>');
							}
						?>
					<h2 id="photo">Réalisateur</h2>
						<?php  
							foreach($dbh->query('SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Realisateur" and film_has_personne.id_film = 1') as $row) {
								print('<figure><img class="personne" src="'.$row['chemin'].'" alt="'.$row['legende'].'"><figcaption>'.$row['legende'].'</figcaption></figure>');
							}
						?>
						
					<h2 class="photo">Acteurs</h2>
						<?php  
							foreach($dbh->query('SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Acteur" and film_has_personne.id_film = 1') as $row) {
								print('<figure><img class="personne" src="'.$row['chemin'].'" alt="'.$row['legende'].'"><figcaption>'.$row['legende'].'</figcaption></figure>');
							}
							$dbh = null
						?>
				</section>
			</main>
		<footer>
			<address>Auteur: Anthony Cargnino</address>
		</footer>
	</main>	
	</body>
</html>