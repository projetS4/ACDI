<?php

function myGet($nomVar) {
  if(isset($_GET[$nomVar])) return $_GET[$nomVar];
  if(isset($_POST[$nomVar])) return $_POST[$nomVar];
  return NULL;
}

function slugify($text) {
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) return 'n-a';

  return $text;
}

require_once File::build_path(array('model','Model.php'));

require_once File::build_path(array('lib','Lang.php'));
require_once File::build_path(array('lib','Template.php'));
require_once File::build_path(array('lib','Breadcrumbs.php'));

require_once File::build_path(array('controller','Controller.php'));
require_once File::build_path(array('controller','ControllerMap.php'));
require_once File::build_path(array('controller','ControllerAdmin.php'));

// Récupération des paramètres de l'URL
$action = (is_null(myGet("a"))) ? "showHome" : myGet("a"); // action
$ctller_class = (is_null(myGet("c"))) ? "Controller" : "Controller".ucfirst(myGet("c")); // Class du controller

// Si le controller existe
if(class_exists($ctller_class)) {

  // Si l'action demandée est dans le controller
  if(in_array($action, get_class_methods($ctller_class))) {

    $ctller_class::$action(); // appeler l'action

  } else {
    echo "la méthode n'existe pas";
    Controller::error(404);
  }

} else {
  echo "le controller n'existe pas";
  Controller::error(404);
}

?>
