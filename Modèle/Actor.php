<?php
//extends Person
class Actor
{
	private $role = 'Acteur';
	
	public function __construct() { }
	
	static function getAllActors() {
		require_once "classes/DB.php";
		$db = new DB; 
		$connect = $db->connect();
		$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Acteur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom';
		$prepare = $db->prepare($sql);
		$query = $db->execute();
		$fetch = $db->fetch($query);
		for ($i = 0; $i < count($fetch); $i++) {
			print('<a>' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
		}
	}
	
	function getBaseInfos(){}
}
?>