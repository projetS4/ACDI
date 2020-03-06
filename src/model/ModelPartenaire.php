<?php

class ModelPartenaire extends Model {
  protected $nom;
  protected $site;
  protected $image;

  protected static $table = "`mon-partenaires`";
  protected static $class = "ModelPartenaire";
  protected static $primary = "nom";
  protected static $dir = "img/upload/partenaires/";
}

?>
