<section id="search">
  <header>
    <h2><?= $text["h2"] ?></h2>
    <div class="bar"></div>
  </header>

  <p class="search-keywords"><?= $text["kw"] ?> <b><?= htmlspecialchars($s) ?></b></p>
  <?= $text["message"] ?>

  <?php if($resultats) { ?>

  <div class="search-results">
    <ul>
      <?php foreach ($resultats as $article) { ?>
      <li>
        <a href="index.php?a=showArticle&r=<?= $article->get("id_rubrique") ?>#<?= slugify($article->get("titre_".Lang::get())) ?>">
          <article>
            <h3><?= $article->get("titre_".Lang::get()) ?></h3>
            <div class="preview"><?= $article->get("contenu_".Lang::get()) ?>&hellip;</div>
          </article>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>

  <?php } ?>

</section>
