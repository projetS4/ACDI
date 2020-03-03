<section id="slideshow" class="slideshow">

  <?php foreach ($carrousel as $k => $slide) { ?>
    <div class="slide<?= ($k == 0) ? " current" : NULL; ?>">
      <img src="<?= $slide->get("image") ?>" alt="<?= $slide->get("titre_".Lang::get()) ?>"/>
      <h2> <a href="<?= $slide->get("lien") ?>"><?= $slide->get("titre_".Lang::get()) ?> <i class="fas fa-arrow-right"></i></a> </h2>
    </div>
  <?php } ?>

  <nav class="dotstyle dotstyle-hop">
    <ul>
      <?php foreach ($carrousel as $k => $slide) { ?>
        <li<?= ($k == 0) ? ' class="current"' : NULL; ?>><button><?= $slide->get("titre_".Lang::get()) ?></button></li>
      <?php } ?>
    </ul>
  </nav>

</section>

<section id="slogan">
  <p><?= $slogan ?></p>
  <div class="bar"></div>
</section>

<section id="bubbles">
  <div class="bubbles--head">
    <div class="head--skewed-bg--white-lighter"> </div>
    <div class="head--skewed-bg--white"> </div>
  </div>
  <div class="bubbles--content">
    <div class="content--wrapper">

      <div class="content--bg"></div>

      <ul>
        <div class="content--row">
          <li><a href="<?= $hexagon_profil ?>"><img src="img/hexagon/<?= Lang::get() ?>/profile.png" alt="<?= $alt_profil ?>"/></a></li>
          <li><a href="<?= $hexagon_programme ?>"><img src="img/hexagon/<?= Lang::get() ?>/programme.png" alt="<?= $alt_profil ?>"/></a></li>
        </div>
        <div class="content--row">
          <li><a href="<?= $hexagon_debouches ?>"><img src="img/hexagon/<?= Lang::get() ?>/debouches.png" alt="<?= $alt_profil ?>"/></a></li>
          <li><a href="<?= $hexagon_presentation ?>"><img src="img/hexagon/<?= Lang::get() ?>/infos.png" alt="<?= $alt_profil ?>"/></a></li>
          <li><a href="<?= $hexagon_carte ?>"><img src="img/hexagon/<?= Lang::get() ?>/carte.png" alt="<?= $alt_profil ?>"/></a></li>
        </div>
        <div class="content--row">
          <li><a href="<?= $hexagon_feminin ?>"><img src="img/hexagon/<?= Lang::get() ?>/feminin.png" alt="<?= $alt_profil ?>"/></a></li>
          <li><a href="<?= $hexagon_presse ?>"><img src="img/hexagon/<?= Lang::get() ?>/presse.png" alt="<?= $alt_profil ?>"/></a></li>
        </div>

      </ul>

    </div>
  </div>
</section>

<section id="numbers">
  <div class="numbers--head">
    <div class="head--skewed-bg--green"> </div>
  </div>
  <div class="numbers--wrapper">
    <div class="numbers--content">
      <ul>
        <?php foreach ($nombres as $nb) { ?>
        <li>
          <p class="number--value"><span class="counter" data-count="<?= $nb->get("valeur") ?>">0</span><?= $nb->get("unite") ?></p>
          <p class="number--title"><?= $nb->get("intitule_".Lang::get()) ?></p>
        </li>
        <?php } ?>
      </ul>
    </div>

    <h2><?= $nombres_titre ?></h2>

  </div>

  <div class="numbers--foot">
    <div class="foot--skewed-bg--green"> </div>
    <div class="foot--skewed-bg--lightpurple"> </div>
    <div class="foot--skewed-bg--grey"> </div>
  </div>

</section>

<section id="students">
  <header class="students--head">
    <h2><?= $temoignages_titre ?></h2>
    <p><a href="<?= $temoignages_lien ?>"><?= $temoignages_lire_tout ?> <i class="fas fa-arrow-right"></i></a></p>
  </header>

  <div class="students--content">
    <!-- Définition du masque octogonal des photos -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="octogon" viewbox="0 0 100 100">
        <polygon points="50,2 50,0 100,0 100,100 50,100 50,98 83.33,83.33 100,48 98.5,50 100,52 83.33,16.66
                         50,2 50,0 0,0 0,100 50,100 50,98 16.66,83.33 0,48 1.5,50 0,52 16.66,16.66"/>
      </symbol>
    </svg>

    <div class="content--wrapper">

      <?php if(count($temoignages) > 1) { ?>
      <nav>
        <ul>
          <li><button class="prev"><i class="fas fa-chevron-left"></i></button></li>
          <li><button class="next"><i class="fas fa-chevron-right"></i></button></li>
        </ul>
      </nav>
      <?php } ?>

      <?php foreach ($temoignages as $k => $temoignage) { ?>
      <article<?= ($k == 0) ? ' class="current"' : NULL; ?>>

        <div class="students--photo">
          <div class="photo--border"></div>
          <div class="photo">
            <img src="<?= $temoignage->get("image") ?>" alt="photo <?= $temoignage->get("nom") ?> <?= $temoignage->get("prenom") ?>"/>
          </div>
          <svg class="octogon"> <use xlink:href="#octogon"> </svg>
        </div>

        <div class="students--message">
          <header>
            <h3><?= $temoignage->get("prenom") ?> <span><?= $temoignage->get("nom") ?></span> <i>/</i></h3>
            <h4><?= (empty($temoignage->get("age"))) ? NULL: $temoignage->get("age")." ans, "; ?><?= $temoignage->get("statut_".Lang::get()) ?></h4>
          </header>
          <div>
            <p><?= $temoignage->get("message_".Lang::get()) ?></p>
          </div>
          <footer>
            <a href="<?= $temoignages_lien ?>"><?= $temoignages_lire_plus ?></a>
          </footer>
        </div>

      </article>
      <?php } ?>

    </div>
  </div>

</section>
