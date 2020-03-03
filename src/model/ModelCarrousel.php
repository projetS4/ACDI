<?php
class ModelCarrousel extends Model {
  protected $id;
  protected $titre_fr;
  protected $titre_en;
  protected $lien;
  protected $image;

  protected static $table = "`MON-slides`";
  protected static $class = "ModelCarrousel";
  protected static $primary = "id";
  protected static $dir = "img/upload/slides/";
}

?>
