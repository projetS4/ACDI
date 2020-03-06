<?php

class ModelIUT extends Model {
  protected $institut;
  protected $universite;
  protected $ville;
  protected $region;
  protected $adresse;
  protected $code_postal;
  protected $gmaps;
  protected $site;
  protected $tel;
  protected $longitude;
  protected $latitude;
  protected $image;
  protected $id_responsable;

  protected static $table = "`mon-instituts`";
  protected static $class = "ModelIUT";
  protected static $primary = "institut";
  protected static $dir = "img/upload/iut/";

  // Séletionner les IUT d'une région
	public static function selectFromRegion($region) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT * FROM $table_name WHERE region = :r";

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

  // Séletionner un IUT correspondant à une LP spécifique
	public static function selectByLp($id_lp) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT iut.* FROM $table_name iut JOIN `MON-lpros` lp ON iut.institut = lp.institut WHERE id = :lp";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("lp" => $id_lp);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab[0];

		} catch(PDOException $e) { return false; }
  }

  // Séletionner l'IUT le plus proche
	public static function selectIutProche($lat,$long) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $formule = "(6371 * acos (
      cos ( radians($lat) )
      * cos( radians( latitude ) )
      * cos( radians( longitude ) - radians($long) )
      + sin ( radians($lat) )
      * sin( radians( latitude ) )
    ))";

    $sql = "SELECT *, $formule AS proximite FROM $table_name ORDER BY proximite LIMIT 0,1";

		try {

	    $req_prep = Model::$pdo->query($sql);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab[0];

		} catch(PDOException $e) { return false; }
  }

  // Séletionner l'IUT le plus proche
	public static function selectAllWithLP() {
    $table_name = static::$table;
		$class_name = static::$class;

		$sql = "SELECT iut.* FROM $table_name iut JOIN `MON-lpros` lp ON iut.institut = lp.institut";

		try {

	    $rep = Model::$pdo->query($sql);
	    $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);

	    return $rep->fetchAll();

		} catch(PDOException $e) {
			return false;
		}
  }
}

?>
