<?php
class Movie
{	
	public function __construct() { }

	static function getAllMovies() {
		require_once "DB.php";
		$db = new DB; 
		$connect = $db->connect();
		$sql = 'SELECT titre FROM `film` order by titre';
		$prepare = $db->prepare($sql);
		$query = $db->execute();
		$fetch = $db->fetch($query);
		for ($i = 0; $i < count($fetch); $i++) {
			print('<a href="film.php">' . $fetch[$i]['titre']  . '</a>');
		}
	}

	function getBaseInfos(){}
}
?>