<?php foreach ($articles as $a) { ?>

  <section id="<?= slugify($a->get("titre_".Lang::get())) ?>" class="article">
    <header>
      <h2><?= $a->get("titre_".Lang::get()) ?></h2>
      <div class="bar"></div>
    </header>

    <article>
      <?= $a->get("contenu_".Lang::get()) ?>
    </article>

  </section>

<?php } ?>

<?php if(!is_null($temoignages)) require File::build_path(array("view", "article", "temoignages.php")); ?>
