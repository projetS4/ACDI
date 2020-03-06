<?php

class ModelLP extends Model {
  protected $id;
  protected $nom;
  protected $sigle;
  protected $site;

  protected static $table = "`mon-lpros`";
  protected static $class = "ModelLP";
  protected static $primary = "id";
  protected static $dir = NULL;

  // Séletionner les LP d'un IUT
	public static function selectFromIUT($id_iut) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT * FROM $table_name WHERE institut = :iut";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("iut" => $id_iut);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab;

		} catch(PDOException $e) { return false; }
  }

  // Séletionner les LP d'une région
	public static function selectFromRegion($region) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT lp.* FROM $table_name lp
    JOIN `MON-instituts` iut ON lp.institut = iut.institut WHERE region = :r";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("r" => $region);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab;

		} catch(PDOException $e) { return false; }
  }
}

?>
