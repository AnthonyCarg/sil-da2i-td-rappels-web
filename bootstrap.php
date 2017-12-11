<?php

function page($class) {
    require 'Contrôleur\/' . $class . '.php';
	$page = new $class; 
	$page->accueil();
}

$dest = $_GET['dest'];
page($dest.'Controller');

?>
