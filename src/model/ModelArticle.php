<?php

class ModelArticle extends Model {
  protected $id;
  protected $titre_fr;
  protected $titre_en;
  protected $contenu_fr;
  protected $contenu_en;
  protected $tags_fr;
  protected $tags_en;
  protected $id_rubrique;

  protected static $table = "`mon-articles`";
  protected static $class = "ModelArticle";
  protected static $primary = "id";
  protected static $dir = NULL;

  // Séletionner les articles d'une rubrique
	public static function selectFromRubrique($id) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT * FROM $table_name WHERE id_rubrique = :id";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("id" => $id);

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    if(empty($tab)) return false;
	    return $tab;

		} catch(PDOException $e) { return false; }
  }

  // Effectuer une recherche parmi les articles du site
	public static function search($keywords) {
		$table_name		= static::$table;
		$class_name		= static::$class;

    $sql = "SELECT * FROM $table_name WHERE
    MATCH (titre_fr, titre_en, contenu_fr, contenu_en, tags_fr, tags_en) AGAINST(:kw)";
    try {

      $req_prep = Model::$pdo->prepare($sql);
      $values = array("kw" => "%$keywords%");

      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $req_prep->fetchAll();

    } catch(PDOException $e) { return false; }

    if(empty($tab)) return false;
    return $tab;
  }
}
?>
