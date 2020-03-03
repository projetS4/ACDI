<?php

class ModelRegion extends Model {
  protected $nom;

  protected static $table = "`MON-regions`";
  protected static $class = "ModelRegion";
  protected static $primary = "nom";
  protected static $dir = NULL;
}

?>
