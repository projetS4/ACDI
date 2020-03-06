<?php

class ModelTemoignage extends Model {
  protected $id;
  protected $nom;
  protected $prenom;
  protected $age;
  protected $statut_fr;
  protected $statut_en;
  protected $message_fr;
  protected $message_en;
  protected $image;

  protected static $table = "`mon-temoignages`";
  protected static $class = "ModelTemoignage";
  protected static $primary = "id";
  protected static $dir = "img/upload/temoignages/";

  // enregistrer un témoignage
  //methode qui sert à rien car il y a la méthode générique 
  /*public function save() {
    $table_name = static::$table;

    $sql = "INSERT INTO ";
    $sql .= "$table_name (nom, prenom, statut_fr, statut_en, message_fr, message_en";

    if(!empty($this->get('age'))) $sql .= ", age)";
    else $sql .= ")";

    $sql .= "VALUES(:nom, :prenom, :statut_fr, :statut_en, :message_fr, :message_en";

    if(!empty($this->get('age'))) $sql .= ", :age)";
    else $sql .= ")";

    $values = array(
      "nom" => $this->get('nom'),
      "prenom" => $this->get('prenom'),
      "statut_fr" => $this->get('statut_fr'),
      "statut_en" => $this->get('statut_en'),
      "message_fr" => $this->get('message_fr'),
      "message_en" => $this->get('message_en')
    );

    if(!empty($this->get('age'))) $values["age"] = $this->get('age');

  	try {

      $req = Model::$pdo->prepare($sql);
  		$req->execute($values);

  	} catch(PDOException $e) { return false; }
  }*/
}

?>
