<?php

require_once File::build_path(array('model','ModelResponsable.php'));
require_once File::build_path(array('model','ModelIUT.php'));
require_once File::build_path(array('model','ModelLP.php'));

class ControllerMap {

  // afficher tous les IUT
  static function show_IUT() {
    if(!is_null(myGet("lp"))) $iut = ModelIUT::selectAllWithLP();
    else $iut = ModelIUT::selectAll();

    $n = count($iut);

    $js_iut = "";
    foreach($iut as $k => $v) {
      $k++;
      $js_iut .= "{";
      $js_iut .= '"title": "'.$v->get("institut").'",';
      $js_iut .= '"longitude": '.$v->get("longitude").',';
      $js_iut .= '"latitude": '.$v->get("latitude").',';
      $js_iut .= '"type":"circle",';
      $js_iut .= '"scale": 1.4';
      $js_iut .= "}";
      if($n != $k) $js_iut .= ",";
    }

    return "[$js_iut]";
  }

  // texte dans la partie JS
  static function text_lang() {
    $res = array();
    if(Lang::get() == "fr") {
      $res["iut"] = "IUT informatique";
      $res["lp"] = "licences professionnelles";
      $res["geo"] = "La géolocalisation n'est pas activée sur votre navigateur.";
    }
    else {
      $res["iut"] = "IT IUTs";
      $res["lp"] = "professional licenses";
      $res["geo"] = "The geolocation is not enabled on your browser.";
    }

    return $res;
  }

  // afficher les IUT par région OU les informations d'un IUT
  static function show_infos() {
    $nom = myGet("nom");

    if(myGet("type") == "MapImage") { // c'est un IUT
      $iut = ModelIUT::select($nom);

      $responsable = ModelResponsable::select($iut->get("id_responsable"));

      $lp = ModelLP::selectFromIUT($iut->get("institut"));

      if(empty($iut->get("gmaps"))) { // pas de lien Google Maps
        $adresse = "{$iut->get("adresse")}<br />{$iut->get("code_postal")} {$iut->get("ville")}";
      } else { // avec lien Google Maps
        if(Lang::get() == "fr") $gmaps_title = "Voir sur Google Maps";
        else $gmaps_title = "Go to Google Maps";
        $adresse = "<a href='{$iut->get("gmaps")}' title='$gmaps_title' target='_blank'>{$iut->get("adresse")}<br />
        {$iut->get("code_postal")} {$iut->get("ville")}</a>";
      }

      $tel_format = chunk_split($iut->get("tel"), 2, ' ');
      $nom_resp = mb_strtoupper($responsable->get("nom"), 'UTF-8');

      $afficher_lp = NULL;
      if($lp) {
        if(Lang::get() == "fr") $lp_btn_text = "Voir les <b>licences professionnelles</b>";
        else $lp_btn_text = "Show <b>professional licenses</b>";
        $afficher_lp = '<li><i class="fas fa-graduation-cap"></i><button class="lp">'.$lp_btn_text.'</button></li>';
      }

      if(Lang::get() == "fr") {
        $site_internet = "Site internet";
        $appeler = "Appeler";
        $contacter_resp = "Contacter le responsable";
      }
      else {
        $site_internet = "Website";
        $appeler = "Call";
        $contacter_resp = "Contact the manager";
      }

echo <<<EOL
<div class="iut">
  <h3>{$iut->get("institut")}</h3>
  <p class="iut-logo"><img src="{$iut->get("image")}" alt="logo" /></p>
  <ul>
    <li>
      <i class="fas fa-link"></i>
      <a href="{$iut->get("site")}" target="_blank">$site_internet</a>
    </li>
    <li>
      <i class="fas fa-map-marker-alt"></i>
      $adresse
    </li>
    <li>
      <i class="fas fa-phone"></i>
      <a href="tel:+{$iut->get("tel")}" title="$appeler">$tel_format</a>
    </li>
    <li>
      <i class="fas fa-at"></i>
      <a href="mailto:{$responsable->get("mail")}" title="$contacter_resp"><b>$nom_resp {$responsable->get("prenom")}</b> &lt;{$responsable->get("mail")}&gt;</a>
    </li>
    $afficher_lp
  </ul>
</div>
EOL;

if($lp) {

  if(Lang::get() == "fr") $lp_titre = "Liste des licences pro de l'";
  else $lp_titre = "List of professional licenses of the ";

echo <<<EOL
<div class="iut-list_lp">
  <h3>$lp_titre{$iut->get("institut")}</h3>
  <ul>
EOL;
foreach($lp as $v) {
  if(!empty($v->get("sigle"))) $nom_lp = "<b>{$v->get("sigle")}</b> ({$v->get("nom")})";
  else $nom_lp = $v->get("nom");
echo <<<EOL
<li><button class="lp-{$v->get("id")}">$nom_lp</button></li>
EOL;
}
echo <<<EOL
  </ul>
</div>
EOL;

foreach($lp as $v) {
  $resp = ModelResponsable::selectFromLP($v->get("id"));
?>
<div id="lp-<?= $v->get("id") ?>" class="iut-lp">
  <?php if(!empty($v->get("sigle"))) { ?><h3><?= $v->get("sigle") ?></h3><?php } ?>
  <h4><?= $v->get("nom") ?></h4>

  <ul>
    <li>
      <i class="fas fa-link"></i>
      <a href="<?= $v->get("site") ?>" target="_blank"><?= $site_internet ?></a>
    </li>
    <?php foreach ($resp as $r) { ?>
      <li>
        <i class="fas fa-at"></i>
        <a href="mailto:<?= $r->get("mail") ?>" title="<?= $contacter_resp ?>"><b><?= mb_strtoupper($r->get("nom"), 'UTF-8'); ?> <?= $r->get("prenom") ?></b> &lt;<?= $r->get("mail") ?>&gt;</a>
      </li>
    <?php } ?>
  </ul>

</div>
<?php }

}
    } elseif(myGet("type") == "MapArea") { // c'est une région
      $iut = ModelIUT::selectFromRegion($nom);
      $lp = ModelLP::selectFromRegion($nom);

      if(Lang::get() == "fr") $titre_liste = "Liste des IUT informatique en région";
      else $titre_liste = "List of IUTs in the region";

      $btn_lp = NULL;
      if($lp) {
        if(Lang::get() == "fr") $btn_lp = 'Voir la liste des <b class="b-lp">licences professionnelles</b>';
        else $btn_lp = 'Show the list of <b class="b-lp">professional licenses</b>';
      }

?>
<h3><?= $titre_liste ?> <?= $nom ?></h3>
<?php if($iut) { ?>
<?php if($lp) { ?><button class="list"><?= $btn_lp ?></button><?php } ?>
<div class="region list-iut">
  <ul>
    <?php foreach($iut as $v) { ?>
    <li><button><?= $v->get("institut") ?></button></li>
    <?php } ?>
  </ul>
</div>

<?php if($lp) { ?>
<div class="region list-lp">
  <ul>
    <?php foreach($lp as $v) {
      if(!empty($v->get("sigle"))) $nom_lp = "<b>{$v->get("sigle")}</b> ({$v->get("nom")})";
      else $nom_lp = $v->get("nom"); ?>
    <li><button class="<?= $v->get("id") ?>"><?= $nom_lp ?></button></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>
<?php } else {
  if(Lang::get() == "fr") $aucun_iut = "Il n'y a aucun IUT informatique dans cette région";
  else $aucun_iut = "There is no IUT in this region";
?>
<p class="no-result"><i class="fas fa-exclamation-circle"></i> <?= $aucun_iut ?>&hellip;</p>
<?php } ?>
<?php
    }
    exit;
  }

  // rechercher l'IUT correspondant à une LP spécifique
  static function IUT_by_LP() {
    $id_lp = myGet("lp");
    $iut = ModelIUT::selectByLP($id_lp);
    echo $iut->get("institut");
    exit;
  }

  // rechercher l'IUT le plus proche
  static function IUT_proche() {
    $lat = myGet("lat");
    $long = myGet("long");
    $iut = ModelIUT::selectIutProche($lat,$long);
    echo $iut->get("institut");
    exit;
  }

}
?>
