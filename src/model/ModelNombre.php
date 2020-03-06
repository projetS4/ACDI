<?php

class ModelNombre extends Model {
  protected $id;
  protected $intitule_fr;
  protected $intitule_en;
  protected $valeur;
  protected $unite;

  protected static $table = "`mon-nombres`";
  protected static $class = "ModelNombre";
  protected static $primary = "id";
  protected static $dir = NULL;
}

?>
