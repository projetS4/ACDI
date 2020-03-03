<fieldset class="admin-testimonies">
  <legend>Gestion des témoignages</legend>

  <div class="fieldset-content">

    <div id="slideshow-testimonies" class="slideshow">

      <?php foreach($temoignages as $k => $t) { ?>
      <div id="testimonie-<?= $t->get("id") ?>" class="slide<?= ($k == 0) ? " current" : NULL ?>">
        <div class="slide-content">
          <h2><?= $t->get("prenom") ?> <span><?= $t->get("nom") ?></span></h2>
        </div>
        <ul>
          <li><button class="update">Modifier</button></li>
          <li><a href="index.php?c=admin&a=deleteTemoignage&id=<?= $t->get("id") ?>" class="delete">Supprimer</a></li>
        </ul>
      </div>
      <?php } ?>

      <nav class="dotstyle dotstyle-hop">
        <ul>
          <?php foreach($temoignages as $k => $p) { ?>
          <li<?= ($k == 0) ? " class='current'" : NULL ?>><button><?= $p->get("prenom") ?> <?= $p->get("nom") ?></button></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

    <form method="post" action="index.php?c=admin&a=updateTemoignage&n=save" enctype="multipart/form-data">

      <div class="update-exit">
        <button type="button"><i class="fas fa-long-arrow-alt-left"></i> Quitter le mode <b>"modifier"</b></button>
      </div>

      <div class="load">

        <div>

          <div>
            <input type="text" name="nom" id="testimonies-nom" required />
            <label for="testimonies-nom">*Nom</label>
          </div>

          <div>
            <input type="text" name="prenom" id="testimonies-prenom" required />
            <label for="testimonies-prenom">*Prénom</label>
          </div>

          <div>
            <input type="text" name="age" id="testimonies-age" />
            <label for="testimonies-age">Âge</label>
          </div>

        </div>

        <div>

          <div>
            <input type="text" name="statut_fr" id="testimonies-statut_fr" required />
            <label for="testimonies-statut_fr">*Statut (fr)</label>
          </div>

          <div>
            <input type="text" name="statut_en" id="testimonies-statut_en" required />
            <label for="testimonies-statut_en">*Statut (en)</label>
          </div>

        </div>

        <div>

          <div>
            <textarea id="testimonies-message_fr" name="message_fr" placeholder="*témoignage en français&hellip;" required></textarea>
          </div>

          <div>
            <textarea id="testimonies-message_en" name="message_en" placeholder="*témoignage en anglais&hellip;" required></textarea>
          </div>

        </div>

      </div>

      <div class="form-image">
        <input type="file" name="image" id="testimonies-image" class="inputfile" accept="image/*" />
        <label for="testimonies-image"><i class="fas fa-file-image"></i> <span>Image</span></label>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>
</fieldset>
