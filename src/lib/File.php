<?php
Class File {

  // création d'un chemin
  public static function build_path($path_array) {
      $DS = DIRECTORY_SEPARATOR;
      $ROOT_FOLDER = __DIR__;
      return $ROOT_FOLDER.$DS.'..'.$DS.join($DS, $path_array);
  }

  // inclure un fichier seulement s'il existe
  public static function require_file($path) {
    if(file_exists($path)) require_once($path);
  }

}
?>
