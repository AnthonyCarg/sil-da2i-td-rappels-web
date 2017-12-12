<!doctype html>
<html class="no-js" lang="en">
	<head>
	<meta charset="UTF-8">
	<title>WikiMovie</title>
	<link rel="stylesheet" href="Vue/main.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
</head>
<body>
<main>
<?php
	require 'Modèle\Director.php'; // J'inclus la classe Director.
	$director = new Director; 
	require 'Modèle\Actor.php'; // J'inclus la classe Actor.
	$actor = new Actor;
	require 'Modèle\Movie.php'; // J'inclus la classe Movie.
	$movie = new Movie; 
?>
	<header>
	<ul class="navbar">
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Films</a>
				<div class="dropdown-content">
				<?php
					$movie->getAllMovies();
				?>
				</div> 
				</li>
				<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Réalisateurs</a>
				<div class="dropdown-content">
				<?php
					$director->getAllDirectors();
				?>
				</div>
				</li>
				<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Acteurs</a>
				<div class="dropdown-content">
				<?php
					$actor->getAllActors();
				?>
				</div>
				</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Gestion</a>
					<div class="dropdown-content">
						<a>Ajouter un film</a>
						<a>Modifier un film</a>
						<a>Supprimer un film</a>
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

