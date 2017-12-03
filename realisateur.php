<!doctype html>
<html class="no-js" lang="en">
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
	<head>
		<meta charset="UTF-8">
		<title>Réalisateur: 
		<?php	
			foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' and film_has_personne.id_film = 1') as $row) {
				print($row['prenom'] . ' ' . $row['nom']);
				$real_nom = $row['nom'];
				$real_prenom = $row['prenom'];
			}
		?></title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
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
					foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' order by personne.nom, personne.prenom') as $row) {
						print('<a href="realisateur.php">' . $row['prenom'] . ' ' . $row['nom'] . '</a>');
					}
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
					//$dbh = null;
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
					<h1>Réalisateur</h1>
					<h2 class="photo">Présentation</h2>
						<?php  
							foreach($dbh->query('SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Realisateur" and film_has_personne.id_film = 1') as $row) {
								print('<figure><img class="personne" src="'.$row['chemin'].'" alt="'.$row['legende'].'"><figcaption>'.$row['legende'].'</figcaption></figure>');
							}
						echo '<p>Il est née le <time datetime="2001-05-15T19:00">';
						foreach($dbh->query('SELECT date_de_naissance, biographie FROM personne WHERE id=1') as $row) {
							//nom='.$real_nom.' and prenom='.$real_prenom
							print($row['date_de_naissance']);
							echo '</time>.</p>';
							echo '<h2>Biographie</h2>';
							print($row['biographie']);
						}
						
					?>
					<h2>Filmographie</h2>
					<h3>En tant que réalisateur:</h3>
						<ul>
							<li>1987 : My Best Friend's Birthday</li>
							<li>1992 : Reservoir Dogs</li>
							<li>1994 : Pulp Fiction</li>
							<li>1995 : Groom Service</li>
							<li>1997 : Jackie Brown</li>
							<li>2003 : Kill Bill : Volume 1</li>
							<li>2004 : Kill Bill : Volume 2</li>
							<li>2005 : Sin City</li>
							<li>2007 : Boulevard de la mort</li>
							<li>2009 : Inglourious Basterds</li>
							<li>2012 : Django Unchained</li>
							<li>2015 : Les Huit Salopards</li>
							<li>2019 : La Famille Manson</li>
						</ul>
					<h3>En tant qu'acteur:</h3>
						<ul>
							<li>1987 : My Best Friend's Birthday</li>
							<li>1992 : Reservoir Dogs</li>
							<li>1994 : Pulp Fiction</li>
							<li>1994 : Somebody to Love d'Alexandre Rockwell</li>
							<li>1994 : Sleep with Me</li>
							<li>1995 : Destiny Turns on the Radio</li>
							<li>1995 : Groom Service</li>
							<li>1995 : Desperado</li>
							<li>1996 : Girl 6</li>
							<li>1996 : Une nuit en enfer</li>
							<li>1997 : Jackie Brown</li>
							<li>2000 : Little Nicky de Steven Brill</li>
							<li>2003 : Kill Bill : Volume 1</li>
							<li>2005 : Le Magicien d'Oz des Muppets</li>
							<li>2007 : Boulevard de la mort</li>
							<li>2007 : Planète Terreur</li>
							<li>2008 : Chronique des morts-vivants</li>
							<li>2009 : Inglourious Basterds</li>
							<li>2012 : Django Unchained</li>
							<li>2014 : Broadway Therapy</li>
							<li>2015 : Les Huit Salopards</li>
						</ul>
					<h2>Acteurs fétiches</h2>
					<?php  
						foreach($dbh->query('SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Acteur" and personne_has_photo.id_personne = 2 or personne_has_photo.id_personne = 5') as $row) {
							print('<figure><img class="personne" src="'.$row['chemin'].'" alt="'.$row['legende'].'"><figcaption>'.$row['legende'].'</figcaption></figure>');
						}
						$dbh = null
					?>
					
				</section>
			</main>
		<footer>
			<address>Auteur: Anthony Cargnino</address>
		</footer>
	</body>
</html>