<?php
//extends Person
class Director
{

	public static $role = 'Realisateur';
	
	public function __construct() { }
	
	static function getAllDirectors() {
		require_once "DB.php";
		$db = new DB; 
		$connect = $db->connect();
		$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom';
		$prepare = $db->prepare($sql);
		$query = $db->execute();
		$fetch = $db->fetch($query);
		for ($i = 0; $i < count($fetch); $i++) {
			print('<a href="realisateur.php">' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
		}
	}
	
	function getBaseInfos(){}
}
?>