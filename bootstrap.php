<?php

function page($class) {
    require 'Contrôleur\/' . $class . '.php';
	$page = new $class; 
	$page->accueil();
}

if (isset($_GET['dest'])) // On a le nom et le prénom
{
	$dest = $_GET['dest'];
	page($dest.'Controller');
}
else
{
	$dest = 'Home';
	page($dest.'Controller');
}
?>
