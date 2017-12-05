<?php
require_once('config.php');

// connexion et choix de la BD
class DB
{

	public static $dbh;
	public static $sth;
	public static $reponse;
	public static $donnees;
	//connexion à la base de données
	public function connect() {
		// connexion et choix de la BD
		try {
			self::$dbh = new PDO(config::$dsn, config::$user, config::$pass);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
		return self::$dbh;
	}
	
	//préparation de requête et passage de paramètre sécurisé
	public function prepare($sql) {
		self::$sth = self::$dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		return self::$sth;
	}
	
	//exécution de requête
	public function execute() {
		self::$reponse = self::$sth->execute();
		return self::$reponse;
	}
	
	//récupération de résultats
	public function fetch() {
		self::$donnees = self::$sth->fetchAll();
		return self::$donnees;
	}

}
?>