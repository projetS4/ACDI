<?php
class Conf {
  static private $databases = array(
    'hostname' => 'webinfo.iutmontp.univ-montp2.fr',  // nom de l'hôte
    'database' => 'baurensm2',   // nom de la base de données
    'login' => 'baurensm2',        // identifiant
    'password' => 'MAXbaure'         // mot de passe
  );

  static public function getData($data) {
    return self::$databases[$data];
  }
}
?>
