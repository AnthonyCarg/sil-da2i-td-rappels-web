<?php
	
class Actor extends Person
{
	private $role = 'Acteur';
	
	public function __construct() { }
	
	static function getAllActors($dbh) {
		foreach($dbh->query('SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Acteur\' and film_has_personne.id_film = 1 order by personne.nom, personne.prenom') as $row) {
			
		}
	}
	
	function getBaseInfos(){}
}
?>