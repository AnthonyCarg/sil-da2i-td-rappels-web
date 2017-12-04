	<?php
		require 'Movie.php'; // J'inclus la classe.
		$objet = new Movie; 
	
	?>
<?php require 'Vue/header.php'; ?>
			<main>
				<section>
					<h1><?php  
							$sql = 'SELECT titre FROM film WHERE titre = \'Django Unchained\'';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print($fetch[$i]['titre']);
							}
						?></h1>
					<h2>Date de sortie</h2>
						<p>Le film est sortie le <time><?php  
						    $sql = 'SELECT date_de_sortie FROM film WHERE titre = \'Django Unchained\'';
						    $prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print($fetch[$i]['date_de_sortie']);
							}
						?></time>.</p>
					<h2>Noms des acteurs principaux</h2>
						<ul>
						<?php	
							$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.id_film = 1 and film_has_personne.role = \'Acteur\'';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print('<li>' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</li>');
							}
						?>
						</ul>
					<h2>Synopsis</h2>
						<p><?php 
							$sql = 'SELECT synopsis FROM film WHERE titre = \'Django Unchained\'';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print($fetch[$i]['synopsis']);
							}
						?></p>
					<h2>Note</h2>
						<p>Ce film est noté <meter min="0" max="5" value="4.5"><?php
							$sql = 'SELECT note FROM film WHERE titre = \'Django Unchained\'';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print($fetch[$i]['note']);
							}
						?></meter>.</p>
					<h2 class="image">Image du film</h2>
						<?php  
							$sql = 'SELECT photo.chemin, photo.legende FROM `film_has_photo` left join `photo` on photo.id = film_has_photo.id_photo WHERE film_has_photo.id_film = 1';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print('<figure><img class="film" src="'.$fetch[$i]['chemin'].'" alt="'.$fetch[$i]['legende'].'"><figcaption>'.$fetch[$i]['legende'].'</figcaption></figure>');
							}
						?>
					<h2 id="photo">Réalisateur</h2>
						<?php  
							$sql = 'SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Realisateur" and film_has_personne.id_film = 1';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print('<figure><img class="personne" src="'.$fetch[$i]['chemin'].'" alt="'.$fetch[$i]['legende'].'"><figcaption>'.$fetch[$i]['legende'].'</figcaption></figure>');
							}
						?>
						
					<h2 class="photo">Acteurs</h2>
						<?php
							$sql = 'SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Acteur" and film_has_personne.id_film = 1';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print('<figure><img class="personne" src="'.$fetch[$i]['chemin'].'" alt="'.$fetch[$i]['legende'].'"><figcaption>'.$fetch[$i]['legende'].'</figcaption></figure>');
							}
						?>
				</section>
			</main>
<?php require 'Vue/footer.php'; ?>	