<?php	

class DirectorController {
	
	public function __construct() {
		
	}
	
	function accueil() {
		require_once 'Vue/header.php';
		$director->getBaseInfos();	
		require_once 'Vue/footer.php';	
	}
}
?>