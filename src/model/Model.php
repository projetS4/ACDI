<?php
require_once File::build_path(array("config","Conf.php"));

class Model{
	public static $pdo;

	public static function Init(){
		$hostname = Conf::getData("hostname");
		$db_name  = Conf::getData("database");
		$login    = Conf::getData("login");
		$password = Conf::getData("password");

		try {
      // connexion à la BD
			$pdo_options = array(PDO::  MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			self::$pdo = new PDO("mysql:host=$hostname;dbname=$db_name", $login, $password, $pdo_options);
		} catch (PDOException $e) {

      // affiche un message d'erreur
      echo (Conf::getDebug()) ? $e->getMessage() : 'Une erreur est survenue.';
		  die();

		}

	}

	// getter
	public function get($att){
	 return $this->$att;
	}

	public static function getDir() {
    return static::$dir;
  }

	// setter
	public function set($att,$val){
		$this->$att = $val;
	}

	// constructeur
	public function __construct($data = NULL) {
        if (!is_null($data)) {
			foreach($data as $k => $v){
				$this->$k = $v;
			}
    }
  }

	// Sélectionner tous les tuples d'une table
	public static function selectAll() {
		$table_name = static::$table;
		$class_name = static::$class;
		$primary_key= static::$primary;
		$dir				= static::$dir;

		$sql = "SELECT * FROM $table_name";

		//try {

			//grosse injection sql
	    	/*$rep = Model::$pdo->query($sql);
	    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);*/
	    	//remplacr par
	    	$rep= Model::$pdo->prepare($sql);
	    	$rep->execute();
	    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);

			$tab = $rep->fetchAll();
			foreach ($tab as $t) $t->set("image", Image::select($dir, $t->get($primary_key)));

	    	return $tab;

		/*} catch(PDOException $e) {
			return false;
		}*/
  }

	// Sélectionner le dernier tuple
  public static function selectLast() {
		$table_name		= static::$table;
		$class_name		= static::$class;
		$primary_key	= static::$primary;
		$dir					= static::$dir;

    $sql = "SELECT * FROM $table_name ORDER BY id DESC";

		try {
			//injection sql 
			/*$rep = Model::$pdo->query($sql);
	    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);*/
	    	$rep= Model::$pdo->prepare($sql);
	    	$rep->execute();
	    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);

			$tab = $rep->fetchAll();
			foreach ($tab as $t) $t->set("image", Image::select($dir, $t->get($primary_key)));

	    return $tab[0];

		} catch(PDOException $e) { return false; }
  }

	// Séletionner un tuple d'une table
	public static function select($primary_value) {
		$table_name		= static::$table;
		$class_name		= static::$class;
		$primary_key	= static::$primary;
		$dir					= static::$dir;

    $sql = "SELECT * FROM $table_name WHERE $primary_key = :pk";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("pk" => $primary_value);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;

			$tab[0]->set("image", Image::select($dir, $tab[0]->get($primary_key)));
	    return $tab[0];

		} catch(PDOException $e) { return false; }
  }

  // Supprimer un tuple d'une table
  public function delete() {
		$table_name = static::$table;
		$primary_key = static::$primary;

    $sql = "DELETE FROM $table_name WHERE $primary_key = :pk";
		$values = array("pk" => $this->get($primary_key));

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $req_prep->execute($values);

		} catch(PDOException $e) { return false; }
  }

	// enregistrer un tuple
  public function save() {
    $table_name = static::$table;

		$attr_text = array(); $val_text = array(); $values = array();
		foreach($this as $attr => $val) {
			if($attr != "image" && $attr != "id") {
				$attr_text[] = $attr;
				$val_text[] = ":$attr";
				$values[$attr] = (empty($val)) ? NULL: $val;
			}
		}

		$attr_text = implode(",",$attr_text);
		$val_text = implode(",",$val_text);

    $sql = "INSERT INTO $table_name ($attr_text) VALUES($val_text)";

  	try {

      $req = Model::$pdo->prepare($sql);
  		$req->execute($values);

  	} catch(PDOException $e) { return false; }
  }

	// modifier un tuple
	public function update() {
		$table_name = static::$table;
		$primary_key = static::$primary;

		$text_sql = array(); $values = array();
		foreach($this as $attr => $val) {
			if($attr != "image") {
				$text_sql[] = "$attr=:$attr";
				$values[$attr] = (empty($val)) ? NULL: $val;
			}
		}

		$where = "WHERE $primary_key = :$primary_key";
		if(count($text_sql) == 1) $where = NULL;

		$text_sql = implode(",",$text_sql);

		$sql = "UPDATE $table_name SET $text_sql $where";
		try {

			$req = Model::$pdo->prepare($sql);
			$req->execute($values);

		} catch(PDOException $e) { return false; }
	}

}
Model::Init();
?>
