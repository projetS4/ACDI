<section id="entreprise">
  <header>
    <h2><?= $text["h2"] ?></h2>
    <div class="bar"></div>
  </header>

  <p><?= $text["info"] ?></p>

  <fieldset>
    <legend><?= $text["legend"] ?></legend>

    <form method="post" action="index.php?c=entreprise&a=send" enctype="multipart/form-data" class="fieldset-content">

      <div class="flex-column form-select">
        <div>
          <select name="iut[]">
            <option value="-1" selected>--- <?= $text["select"] ?> ---</option>
            <?php foreach ($etablissements as $iut) { ?>
            <option value="<?= $iut->get("institut") ?>"><?= $iut->get("institut") ?></option>
            <?php } ?>
          </select>

          <button type="button" class="select-delete"><i class="fas fa-times"></i></button>
        </div>

        <button type="button" class="select-add"><i class="fas fa-plus"></i> <?= $text["ajout"] ?></button>
      </div>

      <div class="flex-row form-object">
        <input type="text" name="entreprise" id="nom-entreprise" required />
        <label for="nom-entreprise">*<?= $text["nom"] ?></label>
      </div>

      <div class="flex-row form-object">
        <input type="email" name="mail" id="mail-entreprise" required />
        <label for="mail-entreprise"><i class="fas fa-at"></i> *<?= $text["mail"] ?></label>
      </div>

      <div class="flex-row form-object">
        <input type="text" name="objet" id="objet" required />
        <label for="objet">*<?= $text["obj"] ?></label>
      </div>

      <div class="flex-column">
        <textarea name="message" placeholder="*message&hellip;" required></textarea>
      </div>

      <div class="flex-column form-file">
        <input type="file" name="fichier" id="fichier" class="inputfile"/>
        <label for="fichier"><i class="fas fa-paperclip"></i> <span><?= $text["fichier"] ?></span></label>
      </div>

      <div class="flex-column">
        <button type="submit"><?= $text["ok"] ?></button>
      </div>

    </form>
  </fieldset>
</section>
