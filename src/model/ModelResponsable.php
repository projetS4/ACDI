<?php

class ModelResponsable extends Model {
  protected $id;
  protected $nom;
  protected $prenom;
  protected $mail;

  protected static $table = "`mon-responsables`";
  protected static $class = "ModelResponsable";
  protected static $primary = "id";
  protected static $dir = NULL;

  // Séletionner les responsables d'une LP
	public static function selectFromLP($id_lp) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT r.* FROM `MON-responsables-lpros` rl
    JOIN $table_name r ON rl.id_responsable = r.id WHERE id_lpro = :lp";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("lp" => $id_lp);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab;

		} catch(PDOException $e) { return false; }
  }

}

?>
