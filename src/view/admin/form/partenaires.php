<fieldset class="admin-partners">
  <legend>Gestion des partenaires</legend>

  <div class="fieldset-content">

    <div id="slideshow-partners" class="slideshow">

      <?php foreach($partenaires as $k => $p) { ?>
        <div class="slide<?= ($k == 0) ? " current" : NULL ?>">
          <img src="<?= $p->get("image") ?>" alt="<?= $p->get("nom") ?>"/>
          <h2> <a href="<?= $p->get("site") ?>"><?= $p->get("nom") ?> <i class="fas fa-arrow-right"></i></a> </h2>
          <ul>
            <li><button class="update">Modifier</button></li>
            <li><a href="index.php?c=admin&a=deletePartenaire&nom=<?= rawurlencode($p->get("nom")) ?>" class="delete">Supprimer</a></li>
          </ul>
        </div>
      <?php } ?>

      <nav class="dotstyle dotstyle-hop">
        <ul>
          <?php foreach($partenaires as $k => $p) { ?>
          <li<?= ($k == 0) ? " class='current'" : NULL ?>><button><?= $p->get("nom") ?></button></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

    <form method="post" action="index.php?c=admin&a=updatePartenaire&n=save" enctype="multipart/form-data">

      <div class="update-exit">
        <button type="button"><i class="fas fa-long-arrow-alt-left"></i> Quitter le mode <b>"modifier"</b></button>
      </div>

      <div>
        <input type="text" name="nom" id="partners-nom" class="title" required />
        <label for="partners-nom">*Nom</label>
      </div>

      <div>
        <input type="text" name="lien" id="partners-lien" class="link" required />
        <label for="partners-lien">*<i class="fas fa-link"></i> site</label>
      </div>

      <div class="form-image">
        <input type="file" name="image" id="partners-image" class="inputfile" accept="image/*" />
        <label for="partners-image"><i class="fas fa-file-image"></i> <span>*Image</span></label>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>
</fieldset>
