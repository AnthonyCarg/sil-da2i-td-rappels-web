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
		$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom';
		$prepare = $db->prepare($sql);
		$query = $db->execute();
		$fetch = $db->fetch($query);
		for ($i = 0; $i < count($fetch); $i++) {
			print('<a href="?dest=Director">' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
		}
	}
	
	function getBaseInfos(){
		require_once "classes/DB.php";
		$db = new DB; 
		$connect = $db->connect();
		echo '<main>
			<section>
					<h1>Réalisateur</h1>
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
					echo '<h2>Filmographie</h2>
					<h3>En tant que réalisateur:</h3>
						<ul>
							<li>1987 : My Best Friend\'s Birthday</li>
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
					<h3>En tant qu\'acteur:</h3>
						<ul>
							<li>1987 : My Best Friend\'s Birthday</li>
							<li>1992 : Reservoir Dogs</li>
							<li>1994 : Pulp Fiction</li>
							<li>1994 : Somebody to Love d\'Alexandre Rockwell</li>
							<li>1994 : Sleep with Me</li>
							<li>1995 : Destiny Turns on the Radio</li>
							<li>1995 : Groom Service</li>
							<li>1995 : Desperado</li>
							<li>1996 : Girl 6</li>
							<li>1996 : Une nuit en enfer</li>
							<li>1997 : Jackie Brown</li>
							<li>2000 : Little Nicky de Steven Brill</li>
							<li>2003 : Kill Bill : Volume 1</li>
							<li>2005 : Le Magicien d\'Oz des Muppets</li>
							<li>2007 : Boulevard de la mort</li>
							<li>2007 : Planète Terreur</li>
							<li>2008 : Chronique des morts-vivants</li>
							<li>2009 : Inglourious Basterds</li>
							<li>2012 : Django Unchained</li>
							<li>2014 : Broadway Therapy</li>
							<li>2015 : Les Huit Salopards</li>
						</ul>
					<h2>Acteurs fétiches</h2>'; 
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