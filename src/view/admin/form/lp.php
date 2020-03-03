<fieldset class="map-fieldset map-lp">
  <legend>Informations sur les licences professionnelles</legend>

  <div class="fieldset-content">

    <div class="choix">
      <div>
        <p><i class="fas fa-angle-right"></i> Que souhaitez-vous faire ?</p>

        <input type="radio" name="choix-lp" class="choix-ajouter" id="lp-ajouter" checked />
        <label for="lp-ajouter"><b>Ajouter</b> une LP sur la carte</label>

        <input type="radio" name="choix-lp" class="choix-modifier" id="lp-modifier" />
        <label for="lp-modifier"><b>Modifier</b> une LP sur la carte</label>

        <input type="radio" name="choix-lp" class="choix-supprimer" id="lp-supprimer" />
        <label for="lp-supprimer"><b>Supprimer</b> une LP sur la carte</label>
      </div>

      <div class="choix-select">
        <select>
          <option value="-1" selected>--- Choisir une LP ---</option>
          <option value="IUT de Montpellier">IUT de Montpellier</option>
          <option value="IUT d'Arles">IUT d'Arles</option>
          <option value="IUT d'Aix-en-Provence">IUT d'Aix-en-Provence</option>
          <option value="IUT de Blagnac">IUT de Blagnac</option>
        </select>
      </div>
    </div>

    <form method="post" action="#">

      <input type="hidden" name="action" required />

      <div class="form-content">
        <select>
          <option value="-1" selected>--- Choisir un IUT ---</option>
          <option value="IUT de Montpellier">IUT de Montpellier</option>
          <option value="IUT d'Arles">IUT d'Arles</option>
          <option value="IUT d'Aix-en-Provence">IUT d'Aix-en-Provence</option>
          <option value="IUT de Blagnac">IUT de Blagnac</option>
        </select>

        <div>
          <div>
            <input type="text" name="nom" id="lp-nom" required />
            <label for="lp-nom">*Nom</label>
          </div>

          <div>
            <input type="text" name="sigle" id="lp-sigle" />
            <label for="lp-sigle">Sigle</label>
          </div>
        </div>

        <div class="resp first">
          <div>
            <input type="text" name="nom-resp[]" id="iut-nom-resp" required />
            <label for="iut-nom-resp"><i class="fas fa-user-tie"></i> *Nom du responsable</label>
          </div>

          <div>
            <input type="text" name="prenom-resp[]" id="iut-prenom-resp" required />
            <label for="iut-prenom-resp"><i class="fas fa-user-tie"></i> *Prénom du responsable</label>
          </div>

          <div>
            <input type="email" name="mail-resp[]" id="iut-mail-resp" required />
            <label for="iut-mail-resp"><i class="fas fa-at"></i> *Adresse mail du responsable</label>
          </div>

          <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
        </div>

        <div class="resp-add">
          <button type="button" class="add-btn"><i class="fas fa-plus"></i> Ajouter un autre responsable ?</button>
        </div>

        <div>
          <input type="url" name="site" id="lp-site" required />
          <label for="lp-site"><i class="fas fa-link"></i> *Site</label>
        </div>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>
</fieldset>
