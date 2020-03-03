<section id="<?= slugify($temoignages_titre) ?>" class="tem-article">
  <header>
    <h2><?= $temoignages_titre ?></h2>
    <div class="bar"></div>
  </header>

  <div class="temoignages-list">
    <!-- Définition du masque octogonal des photos -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="octogon" viewbox="0 0 100 100">
        <polygon points="50,2 50,0 100,0 100,100 50,100 50,98 83.33,83.33 100,48 98.5,50 100,52 83.33,16.66
                         50,2 50,0 0,0 0,100 50,100 50,98 16.66,83.33 0,48 1.5,50 0,52 16.66,16.66"/>
      </symbol>
    </svg>

    <?php foreach($temoignages as $t) { ?>
    <article>

      <div class="students--photo">
        <div class="photo--border"></div>
        <div class="photo">
          <img src="<?= $t->get("image") ?>" alt="photo <?= $t->get("nom") ?> <?= $t->get("prenom") ?>"/>
        </div>
        <svg class="octogon"> <use xlink:href="#octogon"> </svg>
      </div>

      <div class="students--message">
        <header>
          <h3><?= $t->get("prenom") ?> <span><?= $t->get("nom") ?></span></h3>
          <h4><?= (empty($t->get("age"))) ? NULL: $t->get("age")." ans, "; ?><?= $t->get("statut_".Lang::get()) ?></h4>
        </header>
        <div>
          <p><?= $t->get("message_".Lang::get()) ?></p>
        </div>
      </div>

    </article>
    <?php } ?>
