<?php
Class Image {

  // sauvegarder une image
  public static function save($file, $dir, $name) {

    // si une image est envoyée
    if (!empty($file) && is_uploaded_file($file['tmp_name']) && !empty($file["name"])) {
      // récupérer l'extension du fichier
      $temp = explode(".", $file["name"]);
      $ext = end($temp);

      // si l'extension du fichier n'est pas autorisée
      $allowed_ext = array("jpg", "jpeg", "gif", "png");
      if (!in_array($ext, $allowed_ext))
        return 1;

      self::delete($dir, $name); // supprimer les images qui ont le même nom

      // si la copie de l'image a échoué
      if (!move_uploaded_file($file['tmp_name'], "$dir.$name.$ext")) return 2;

      return 0; // tout est OK
    } return 3;

  }

  // retrouver le chemin absolu d'une image
  public static function select($dir, $name, $defaut = NULL) {

    // effectuer la recherche
    $res = glob($dir.$name.".*"); // .* signifie "rechercher toutes les extensions"

    // retourner le chemin de l'image si elle est trouvée
    if(!empty($res[0])) return $res[0];
    else return $defaut; // sinon, retourner le chemin d'une image par défaut

  }

  // supprimer une image
  public static function delete($dir, $name) {

    // si le répertoire existe
    if(is_dir($dir)) {
      $open = opendir($dir); // l'ouvrir

      // tant que le parcours des fichiers n'est pas terminé
      while (($search = readdir($open)) !== false) {

        // si l'image demandée est trouvée
        if(preg_match('#^'.$name.'\.#',$search))
          unlink($dir.$search); // la supprimer

      } closedir($open); // fermer le répertoire une fois que la recherche est terminée
    } else return false;

  }

}
?>
