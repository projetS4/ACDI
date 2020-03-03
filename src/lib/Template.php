<?php

require_once File::build_path(array('model','ModelContact.php'));
require_once File::build_path(array('model','ModelRubrique.php'));
require_once File::build_path(array('model','ModelPartenaire.php'));

Class Template {

  // HEADER

  // données pour le menu supérieur
  public static function small_nav() {
    $lang = Lang::get();
    if($lang == "fr") $res = array("ent" => "espace entreprise", "carte" => "carte");
    else $res = array("ent" => "corporate space", "carte" => "map");

    return $res;
  }

  // données pour la barre de recherche
  public static function search() {
    $lang = Lang::get();
    if($lang == "fr") $res = "Rechercher";
    else $res = "Search";

    return $res;
  }

  // données pour le menu de navigation principal
  public static function nav() {
    $res = ModelRubrique::selectAll_();
    return $res;
  }

  // FOOTER

  // données pour les partenaires
  public static function partners() {
    $res = ModelPartenaire::selectAll();
    return $res;
  }

  // données pour le titre "partenaires"
  public static function partners_title() {
    $lang = Lang::get();
    if($lang == "fr") $res = "Partenaires";
    else $res = "Partners";

    return $res;
  }

  // données pour le formulaire de contact
  public static function contact() {
    $lang = Lang::get();
    if($lang == "fr") $res = array("mail" => "Adresse mail", "obj" => "Objet", "ok" => "Envoyer");
    else $res = array("mail" => "Mail adress", "obj" => "Subject", "ok" => "Send");

    return $res;
  }

  // données pour l'espace admin
  public static function admin() {
    $lang = Lang::get();
    if($lang == "fr") $res = "Espace admin";
    else $res = "Admin space";

    return $res;
  }

  // données pour la dernière ligne de texte du footer
  public static function bottom_line() {
    $lang = Lang::get();
    if($lang == "fr") $res = array("admin" => "Espace admin", "dut" => "DUT informatique", "cp" => "Site réalisé dans le cadre d'un projet par les étudiants de l'IUT de Montpellier.");
    else $res = array("admin" => "Admin space", "dut" => "IT DUT", "cp" => "Site created as part of a project by the students of the IUT of Montpellier.");

    $res["mail"] = ModelContact::selectAll()[0]->get("mail");

    return $res;
  }

}
?>
