<?php

require_once File::build_path(array('lib','Session.php'));
require_once File::build_path(array('lib','Image.php'));
require_once File::build_path(array('model','ModelCarrousel.php'));
require_once File::build_path(array('model','ModelTemoignage.php'));
require_once File::build_path(array('model','ModelNombre.php'));
require_once File::build_path(array('model','ModelIUT.php'));
require_once File::build_path(array('model','ModelRegion.php'));
require_once File::build_path(array('model','ModelArticle.php'));
require_once File::build_path(array('model','ModelContact.php'));


class Controller {

  // afficher la page d'accueil
  static function showHome() {

    $view   = "view";
    $dir    = "home";

    $carrousel = ModelCarrousel::selectAll();
    $temoignages  = ModelTemoignage::selectAll();
    $nombres = ModelNombre::selectAll();

    $breadcrumbs = Breadcrumbs::build();

    $hexagon_presentation = "index.php?a=showArticle&r=1";
    $hexagon_programme = "index.php?a=showArticle&r=2";
    $hexagon_carte = "index.php?a=showMap&iut_proche";

    if(Lang::get() == "fr") {
      $title  = "Portail national des IUT informatique";

      $slogan = "<strong><i>Bienvenue</i></strong> sur le portail national des départements informatiques des IUT";
      $nombres_titre = "L'IUT info en <span>chiffres</span>";
      $temoignages_titre = "Témoignages";
      $temoignages_lire_tout = "Lire tous les témoignages";
      $temoignages_lire_plus = "Lire plus";

      $temoignages_lien = "index.php?a=showArticle&r=1#temoignages";

      $alt_profil = "Suis-je fait pour l'IUT info ?";
      $alt_debouches = "Débouchés";
      $alt_feminin = "L'info au féminin";
      $alt_presse = "Revues de presse";
    } else {
      $title  = "National portal of the IT IUT";

      $slogan = "<strong><i>Welcome</i></strong> to the national portal of IUT IT departments";
      $nombres_titre = "The IT IUT in <span>figures</span>";
      $temoignages_titre = "Testimonies";
      $temoignages_lire_tout = "Read all testimonies";
      $temoignages_lire_plus = "Read more";

      $temoignages_lien = "index.php?a=showArticle&r=1#testimonies";

      $alt_profil = "Do I have the right profile for the IT IUT?";
      $alt_debouches = "Prospects";
      $alt_feminin = "The computer science department for women";
      $alt_presse = "Press reviews";
    }

    $hexagon_profil = "index.php?a=showArticle&r=1#".slugify($alt_profil);
    $hexagon_debouches = "index.php?a=showArticle&r=3#".slugify($alt_debouches);
    $hexagon_feminin = "index.php?a=showArticle&r=1#".slugify($alt_feminin);
    $hexagon_presse = "index.php?a=showArticle&r=1#".slugify($alt_presse);

    require File::build_path(array('view','view.php'));
  }

  // afficher une page article
  static function showArticle() {

    $view   = "view";
    $dir    = "article";

    if(!is_null($r = myGet("r"))) {
      $rubrique = ModelRubrique::select($r);
      $title  = $rubrique->get("nom_".Lang::get());

      $articles = ModelArticle::selectFromRubrique($r);
      if(!$articles) self::error(404);

      $temoignages = NULL;
      if($r == 1) { // cette rubrique contient des témoignages
        if(Lang::get() == "fr") $temoignages_titre = "Témoignages";
        else  $temoignages_titre = "Testimonies";
        $temoignages  = ModelTemoignage::selectAll();
      }

      $bc = array("lien" => "index.php?a=showArticle&r".$r, "titre_fr" => $rubrique->get("nom_fr"), "titre_en" => $rubrique->get("nom_en"));
      $breadcrumbs = Breadcrumbs::build(array($bc));

      require File::build_path(array('view','view.php'));

    } else self::error(404);
  }

  // afficher la carte
  static function showMap() {

    $view   = "view";
    $dir    = "map";

    if(Lang::get() == "fr") {
      $title  = "Carte des départements informatiques des IUT de France";
      $h2 = "Carte des IUT informatique";
      $intro = "Cliquez sur <b>un point</b> de la carte pour afficher les informations liées à un établissement,
      ou cliquez sur <b>une région</b> pour voir la liste des IUT informatique qu'elle propose";
      $btn_iut_proche = "Trouver mon IUT <b>le plus proche</b>";
      $filtrer = "Filtrer :";
      $afficher_iut_avec_lp = "n'afficher que les IUT proposant des licences professionnelles";
      $fermer_fenetre = "Fermer cette fenêtre";
    }
    else {
      $title  = "Map of IT departments of IUTs of France";
      $h2 = "Map of the IT IUTs";
      $intro = "Click on <b>a marker</b> on the map to display information related to an establishment, or click on <b>a region</b> to see the list of IUTs it offers";
      $btn_iut_proche = "Find my <b>nearest</b> IUT";
      $filtrer = "Filter:";
      $afficher_iut_avec_lp = "show only IUTs offering professional licenses";
      $fermer_fenetre = "Close this window";
    }

    if(!is_null(myGet("lp"))) {
      $filtre_selected = "class='selected'";
      $lien_filtre = NULL;
    }
    else {
      $filtre_selected = NULL;
      $lien_filtre = "&lp";
    }

    $trigger_iut_proche = NULL;
    if(!is_null(myGet("iut_proche"))) $trigger_iut_proche = " triggered";

    $bc = array("lien" => "index.php?a=showMap", "titre_fr" => "Carte des IUT informatique", "titre_en" => "Map of the IT IUTs");
    $breadcrumbs = Breadcrumbs::build(array($bc));

    require File::build_path(array('view','view.php'));
  }

  // afficher l'espace entreprise
  static function showCompany() {

    $view   = "view";
    $dir    = "company";

    $etablissements = ModelIUT::selectAll();
    $text = array();

    if(Lang::get() == "fr") {
      $title  = "Espace entreprise";
      $text["h2"] = "Espace entreprise";
      $text["info"] = "Les champs précédés d'un astérisque (*) sont obligatoires.";
      $text["legend"] = "Proposer une offre de stage";
      $text["select"] = "Choisir un établissement";
      $text["ajout"] = "Ajouter un autre établissement ?";
      $text["nom"] = "Nom de l'entreprise";
      $text["mail"] = "Adresse mail de l'entreprise";
      $text["obj"] = "Objet";
      $text["fichier"] = "Joindre un fichier";
      $text["ok"] = "Envoyer";
    } else {
      $title  = "Corporate space";
      $text["h2"] = "Corporate space";
      $text["info"] = "Fields marked with an asterisk (*) are required.";
      $text["legend"] = "Submit an internship offer";
      $text["select"] = "Select an establishment";
      $text["ajout"] = "Add another establishment?";
      $text["nom"] = "Company Name";
      $text["mail"] = "Company mail adress";
      $text["obj"] = "Subject";
      $text["fichier"] = "Attach a file";
      $text["ok"] = "Send";
    }

    $bc = array("lien" => "index.php?a=showCompany", "titre_fr" => "Espace entreprise", "titre_en" => "Corporate space");
    $breadcrumbs = Breadcrumbs::build(array($bc));

    require File::build_path(array('view','view.php'));

  }

  // afficher l'espace admin
  static function showAdmin($message = NULL) {

    $view   = "connexion"; // si l'utilisateur n'est pas connecté
    $dir    = "admin";
    $title  = "Espace admin";

    $bc = array("lien" => "index.php?a=showAdmin", "titre_fr" => "Espace admin", "titre_en" => "Admin space");
    $breadcrumbs = Breadcrumbs::build(array($bc));

    // si l'utilisateur est connecté
    if(Session::is_connected()) {
      $view = "view";

      $contact["mail"] = ModelContact::selectAll()[0]->get("mail");
      $carrousel = ModelCarrousel::selectAll();
      $nombres = ModelNombre::selectAll();
      $partenaires = ModelPartenaire::selectAll();
      $temoignages = ModelTemoignage::selectAll();
    }

    require File::build_path(array('view','view.php'));

  }

  // changer la langue
  static function changeLang() {
    if(!is_null($l = myGet("lang"))) {
      $duree = time() + 365*24*3600; // durée du cookie : 1 an
      setcookie('lang', $l);
      header('Location: index.php');
    } else self::error(404);
  }

  // rechercher sur le site
  static function search() {

    if(!is_null($s = myGet("s"))) {
      $view   = "view";
      $dir    = "search";

      $text = array();

      $bc = array("lien" => "index.php?a=search&s=".$s);

      $resultats = ModelArticle::search($s);

      if(Lang::get() == "fr") {
        $title  = "Résultats de votre recherche";
        $bc["titre_fr"] = $title;
        $text["h2"] = $title;
        $text["kw"] = "Votre recherche contient les mot-clés suivants :";
        if($resultats) {
          $text["message"] = "<p class='search-number'><b>".count($resultats)."</b> résultats trouvé";
          if(count($resultats) == 1) $text["message"] .= "</p>";
          else $text["message"] .= "s</p>";
        } else $text["message"] = "<p class='search-number not-found'>Aucun résultat n'a été trouvé</p>";
      } else {
        $title  = "Search results";
        $bc["titre_en"] = $title;
        $text["h2"] = $title;
        $text["kw"] = "Your search contains the following keywords:";
        if($resultats) {
          $text["message"] = "<p class='search-number'><b>".count($resultats)."</b> result";
          if(count($resultats) == 1) $text["message"] .= " found</p>";
          else $text["message"] .= "s found</p>";
        } else $text["message"] = "<p class='search-number not-found'>No results found</p>";
      }

      $breadcrumbs = Breadcrumbs::build(array($bc));

      $resultats = ModelArticle::search($s);

      if($resultats) {
        foreach ($resultats as $article) {
          $article->set("contenu_fr",substr(strip_tags($article->get("contenu_fr")), 0, 400));
          $article->set("contenu_en",substr(strip_tags($article->get("contenu_en")), 0, 400));
        }
      }

      require File::build_path(array('view','view.php'));
    } else self::error(404);
  }

  // afficher la page d'accueil
  static function error($n) {
    if($n == 404) {
      $view   = "404";
      $dir    = "error";

      $text = array();

      if(Lang::get() == "fr") {
        $title  = "Page introuvable";
        $text["h3"] = "Page introuvable";
        $text["accueil"] = "Revenir à l'accueil";
      } else {
        $title  = "Page introuvable";
        $text["h3"] = "Page not found";
        $text["accueil"] = "Go to homepage";
      }
    }

    require File::build_path(array('view','view.php')); exit;
  }

}
?>
