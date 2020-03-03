<section id="carte">

  <div class="map-header">
    <h2><?= $h2 ?></h2>
    <div class="bar"></div>
    <p><?= $intro ?></p>

    <p>
      <button class="iut-proche<?= $trigger_iut_proche ?>" type="button"><i class="fas fa-map-marker-alt"></i> <?= $btn_iut_proche ?></button>
    </p>
  </div>

  <p class="map-filtre"><?= $filtrer ?> <a href="index.php?a=showMap<?= $lien_filtre ?>"<?= $filtre_selected ?>><?= $afficher_iut_avec_lp ?></a></p>

  <div class="map-wrapper">

    <div id="map"></div>

    <div class="info-wrapper">

      <button title="<?= $fermer_fenetre ?>" class="fermer"><i class="fas fa-long-arrow-alt-left"></i></button>
      <div class="info-content"> <div id="info"></div> </div>

    </div> <!-- \.info-wrapper -->
  </div> <!-- \.map-wrapper -->

</section>
