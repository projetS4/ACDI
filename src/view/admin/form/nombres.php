<fieldset class="admin-numbers">
  <legend>Gestion des nombres de la page d'accueil</legend>

  <div class="fieldset-content">

    <form method="post" action="index.php?c=admin&a=updateNombres">
      <ol>
        <?php foreach($nombres as $i => $n) { $i++; ?>
        <input type="hidden" name="id<?= $i ?>" value="<?= $n->get("id") ?>" required />
        <li>
          <div>
            <div>
              <input type="number" name="val<?= $i ?>" id="number-nb<?= $i ?>" value="<?= $n->get("valeur") ?>" required />
              <label for="number-nb<?= $i ?>">*Nombre</label>
            </div>
            <div>
              <input type="text" name="intitule_fr<?= $i ?>" id="number-intitule_fr<?= $i ?>" value="<?= $n->get("intitule_fr") ?>" required />
              <label for="number-intitule_fr<?= $i ?>">*Intitulé (fr)</label>
            </div>
            <div>
              <input type="text" name="intitule_en<?= $i ?>" id="number-intitule_en<?= $i ?>" value="<?= $n->get("intitule_en") ?>" required />
              <label for="number-intitule_en<?= $i ?>">*Intitulé (en)</label>
            </div>
            <div>
              <input type="text" name="unite<?= $i ?>" id="number-nb<?= $i ?>" value="<?= $n->get("unite") ?>" />
              <label for="number-unite<?= $i ?>">Unité</label>
            </div>
          </div>
        </li>
        <?php } ?>
      </ol>


      <button type="submit">Valider</button>
    </form>

  </div>
</fieldset>
