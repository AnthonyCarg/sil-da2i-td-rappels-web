<?php
//extends Person
class Director
{

	public static $role = 'Realisateur';
	
	public function __construct() { }
	
	static function getAllDirectors() {
		require_once "classes/DB.php";
		$db = new DB; 
		$connect = $db->connect();
		$sql = 'SELECT personne.id, personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom';
		$prepare = $db->prepare($sql);
		$query = $db->execute();
		$fetch = $db->fetch($query);
		for ($i = 0; $i < count($fetch); $i++) {
			print('<a href="?dest=Director&id='. $fetch[$i]['id'] .'">' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
		}
	}
	
	function getBaseInfos(){
		require_once "classes/DB.php";
		$db = new DB; 
		$connect = $db->connect();
		echo '<h1>Réalisateur</h1>
					<h2 class="photo">Présentation</h2>';
							$sql = 'SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Realisateur" and film_has_personne.id_film = 1';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print('<figure><img class="personne" src="'.$fetch[$i]['chemin'].'" alt="'.$fetch[$i]['legende'].'"><figcaption>'.$fetch[$i]['legende'].'</figcaption></figure>');
							}
							echo '<p>Il est née le <time datetime="2001-05-15T19:00">';
							$sql = 'SELECT date_de_naissance, biographie FROM personne WHERE id=1';
							$prepare = $db->prepare($sql);
							$query = $db->execute();
							$fetch = $db->fetch($query);
							for ($i = 0; $i < count($fetch); $i++) {
								print($fetch[$i]['date_de_naissance']);
								echo '</time>.</p>';
								echo '<h2>Biographie</h2>';
								print($fetch[$i]['biographie']);
							}
					echo '<h2>Acteurs fétiches</h2>'; 
						$sql = 'SELECT photo.chemin, photo.legende, film_has_personne.role FROM `personne_has_photo` left join `photo` on photo.id = personne_has_photo.id_photo join `film_has_personne` on film_has_personne.id_personne = personne_has_photo.id_personne where film_has_personne.role = "Acteur" and personne_has_photo.id_personne = 2 or personne_has_photo.id_personne = 5';
						$prepare = $db->prepare($sql);
						$query = $db->execute();
						$fetch = $db->fetch($query);
						for ($i = 0; $i < count($fetch); $i++) {
							print('<figure><img class="personne" src="'.$fetch[$i]['chemin'].'" alt="'.$fetch[$i]['legende'].'"><figcaption>'.$fetch[$i]['legende'].'</figcaption></figure>');
						}
	}
}
?>