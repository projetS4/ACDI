<?php
class Conf {
  static private $databases = array(
    'hostname' => 'webinfo',  // nom de l'hôte
    'database' => 'joubertj',   // nom de la base de données
    'login' => 'joubertj',        // identifiant
    'password' => 'canard'         // mot de passe
  );

  static public function getData($data) {
    return self::$databases[$data];
  }
}
?>
