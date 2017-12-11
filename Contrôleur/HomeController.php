<?php

class HomeController {
	
	public function __construct() {
		
	}
	
	function accueil() {
		require_once 'Vue/header.php';
		require_once 'Vue/home.php';	
		require_once 'Vue/footer.php';
	}
	
}
?>