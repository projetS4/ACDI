<ul>
  <?php foreach (Template::nav() as $mere) {
          $lien = "index.php?a=showArticle&r=".$mere->get("id");
          $titre = htmlspecialchars($mere->get("nom_".Lang::get()));
          $rubriquesFilles = $mere->get("rubiques_filles");
          $hasFilles = !empty($rubriquesFilles); ?>
    <li>
      <a href="<?= $lien ?>"><?= $titre ?> <?= ($hasFilles) ? '<i class="down fas fa-chevron-down"></i>': NULL; ?></a>
      <?php if($hasFilles) { ?>
        <ul>
            <?php foreach ($rubriquesFilles as $fille) {
                    $lien = "index.php?a=showArticle&r=".$mere->get("id")."#".slugify($fille->get("nom_".Lang::get()));
                    $titre = htmlspecialchars($fille->get("nom_".Lang::get())); ?>
            <li> <a href="<?= $lien ?>"><?= $titre ?></a> </li>
            <?php } ?>
        </ul>
      <?php } ?>
    </li>
  <?php } ?>
</ul>
