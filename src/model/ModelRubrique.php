<?php

class ModelRubrique extends Model {
  protected $id;
  protected $nom_fr;
  protected $nom_en;
  protected $rubiques_filles;

  protected static $table = "`MON-rubriques`";
  protected static $class = "ModelRubrique";
  protected static $primary = "id";
  protected static $dir = NULL;

  // Sélectionner toutes les rubriques
  public static function selectAll_() {
    $table_name = static::$table;
		$class_name = static::$class;

		$sql_RubriquesMeres = "SELECT * FROM $table_name WHERE rubrique_mere IS NULL";

		try {

	    $req_mere = Model::$pdo->query($sql_RubriquesMeres);
	    $req_mere->setFetchMode(PDO::FETCH_CLASS, $class_name);

      $reponse = array();

	    foreach($req_mere->fetchAll() as $rep_mere) {
        $sql_RubriquesFilles = "SELECT * FROM $table_name WHERE rubrique_mere = :rm";
        $values = array("rm" => $rep_mere->get("id"));

        $req_fille = Model::$pdo->prepare($sql_RubriquesFilles);
        $req_fille->execute($values);
  	    $req_fille->setFetchMode(PDO::FETCH_CLASS, $class_name);

        $rep_mere->set("rubiques_filles", $req_fille->fetchAll());

        $reponse[] = $rep_mere;
      }

      return $reponse;

		} catch(PDOException $e) { return false; }
  }

}

?>
