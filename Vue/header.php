<!doctype html>
<html class="no-js" lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Film: Django Unchained</title>
	<link rel="stylesheet" href="Vue/main.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
</head>
<body>
<main>
<?php
	require 'DB.php'; // J'inclus la classe.
	$db = new DB; 
	
	$connect = $db->connect();
?>
	<header>
	<ul class="navbar">
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Films</a>
				<div class="dropdown-content">
				<?php
					$sql = 'SELECT titre FROM `film` order by titre';
					$prepare = $db->prepare($sql);
					$query = $db->execute();
					$fetch = $db->fetch($query);
					for ($i = 0; $i < count($fetch); $i++) {
						print('<a href="film.php">' . $fetch[$i]['titre']  . '</a>');
					}
				?>
				</div>
				</li>
				<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Réalisateurs</a>
				<div class="dropdown-content">
				<?php
					$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Realisateur\' order by personne.nom, personne.prenom';
					$prepare = $db->prepare($sql);
					$query = $db->execute();
					$fetch = $db->fetch($query);
					for ($i = 0; $i < count($fetch); $i++) {
						print('<a href="realisateur.php">' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
					}
				?>
				</div>
				</li>
				<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Acteurs</a>
				<div class="dropdown-content">
				<?php
					$sql = 'SELECT personne.nom, personne.prenom FROM `film_has_personne` left join `personne` on personne.id = film_has_personne.id_personne WHERE film_has_personne.role = \'Acteur\' order by personne.nom, personne.prenom';
					$prepare = $db->prepare($sql);
					$query = $db->execute();
					$fetch = $db->fetch($query);
					for ($i = 0; $i < count($fetch); $i++) {
						print('<a>' . $fetch[$i]['prenom'] . ' ' . $fetch[$i]['nom'] . '</a>');
					}
				?>
				</div>
				</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Gestion</a>
					<div class="dropdown-content">
						<a>Ajouter un film</a>
						<a>Liste des films</a>
					</div>
				</li>
				</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Sélecteurs et effets</a>
					<div class="dropdown-content">
						<a id="hideAside">Cacher le Aside</a>
						<a id="fadeImg">Fondu des images</a>
						<a id="toggleMenu">Basculer le menu</a>
					</div>
				</li>
			</ul>
	</header>

