<?php
Class Breadcrumbs {

  // création d'un fil d'arianne
  public static function build($array = array()) {
    array_unshift($array , array("lien" => "index.php", "titre_fr" => "Accueil", "titre_en" => "Home")); // ajout de l'accueil

    $res = "";
    $lang = Lang::get();
    $n = count($array);

    foreach($array as $k => $crumb) {
      $k++;
      $res .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
      $res .= '<a itemprop="item" href="'.$crumb["lien"].'">';
      if($k == 1) $res .= '<i class="fas fa-home"></i>'; // si l'item correspond à l'accueil
      $res .= '<span itemprop="name">'.$crumb["titre_$lang"].'</span>';
      $res .= '</a>';
      $res .= '<span itemprop="position" content="'.$k.'">';
      if($n != $k) $res .= '&rsaquo;'; // si on n'est pas à la fin du fil d'arianne
      $res .= '</span>';
      $res .= '</li>';
    }

    return $res;
  }

}
?>
