<?php
	// connexion et choix de la BD
class Movie
{
	
	
	public function __construct() { }

	static function getAllMovies($dbh) {
		$result = $dbh->query('SELECT titre FROM `film` order by titre');
		return $result;
	}

	function getBaseInfos(){}
}
?>