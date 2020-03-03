<?php

class ModelAdmin extends Model {
  protected $identifiant;
  protected $mdp;

  protected static $table = "`MON-admin`";
  protected static $class = "ModelAdmin";
  protected static $primary = "identifiant";
  protected static $dir = NULL;

  // Vérifier les identifiants lors de la connexion
	public static function checkPassword($id, $mdp_chiffre) {
		$table_name		= static::$table;

    $sql = "SELECT * FROM $table_name WHERE identifiant = :id AND mdp = :mdp";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("id" => $id, "mdp" => $mdp_chiffre);

	    $req_prep->execute($values);

      // retourne true si un résultat a été trouvé et false sinon
			return !empty($req_prep->fetchAll());

		} catch(PDOException $e) { return false; }
  }

  // Modifier le compte admin
	public function update() {
		$table_name		= static::$table;

    $sql = "UPDATE $table_name SET identifiant = :id, mdp = :mdp";

		try {

	    $req_prep = Model::$pdo->prepare($sql);
	    $values = array("id" => $this->get("identifiant"), "mdp" => $this->get("mdp"));

	    $req_prep->execute($values);

		} catch(PDOException $e) { return false; }
  }
}

?>
