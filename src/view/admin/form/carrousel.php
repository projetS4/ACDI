<fieldset class="admin-carousel">
  <legend>Gestion du carrousel</legend>

    <div class="fieldset-content">

      <div id="slideshow-carousel" class="slideshow">
        <?php foreach ($carrousel as $k => $slide) { ?>
        <div id="slide-<?= $slide->get("id") ?>" class="slide<?= ($k == 0) ? " current" : NULL; ?>">
          <img src="<?= $slide->get("image") ?>" alt="<?= $slide->get("titre_fr") ?>"/>
          <h2 class="titre fr"> <a href="<?= $slide->get("lien") ?>"><?= $slide->get("titre_fr") ?> <i class="fas fa-arrow-right"></i></a> </h2>
          <h2 class="titre en"> <a href="<?= $slide->get("lien") ?>"><?= $slide->get("titre_en") ?> <i class="fas fa-arrow-right"></i></a> </h2>
          <ul>
            <li><button class="update">Modifier</button></li>
            <li><a href="index.php?c=admin&a=deleteSlide&id=<?= $slide->get("id") ?>" class="delete">Supprimer</a></li>
          </ul>
        </div>
        <?php } ?>

        <nav class="dotstyle dotstyle-hop">
          <ul>
            <?php foreach ($carrousel as $k => $slide) { ?>
              <li<?= ($k == 0) ? ' class="current"' : NULL; ?>><button><?= $slide->get("titre_".Lang::get()) ?></button></li>
            <?php } ?>
          </ul>
        </nav>
      </div>

      <form method="post" action="index.php?c=admin&a=updateSlide&n=save" enctype="multipart/form-data">

        <div class="update-exit">
          <button type="button"><i class="fas fa-long-arrow-alt-left"></i> Quitter le mode <b>"modifier"</b></button>
        </div>

        <div>
          <input type="text" name="titre_fr" id="carousel-titre_fr" class="title" required />
          <label for="carousel-titre_fr">*Titre (fr)</label>
        </div>

        <div>
          <input type="text" name="titre_en" id="carousel-titre_en" class="title en" required />
          <label for="carousel-titre_en">*Titre (en)</label>
        </div>

        <div>
          <input type="text" name="lien" id="carousel-lien" class="link" required />
          <label for="carousel-lien">* <i class="fas fa-link"></i> Page</label>
        </div>

        <div class="form-image">
          <input type="file" name="image" id="carousel-image" class="inputfile" accept="image/*"/>
          <label for="carousel-image"><i class="fas fa-file-image"></i><span>*Image</span></label>
        </div>

        <button type="submit">Valider</button>
      </form>

    </div>

</fieldset>
