<?php

class MovieController {
	
	public function __construct() {
		
	}
	
	function accueil() {
		require_once 'Vue/header.php';
		$movie->getBaseInfos();	
		require_once 'Vue/footer.php';	
	}
	
}
?>