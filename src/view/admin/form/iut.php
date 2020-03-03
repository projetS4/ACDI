<fieldset class="map-fieldset map-iut">
  <legend>Informations sur les instituts</legend>

  <div class="fieldset-content">

    <div class="choix">
      <div>
        <p><i class="fas fa-angle-right"></i> Que souhaitez-vous faire ?</p>

        <input type="radio" name="choix-iut" class="choix-ajouter" id="iut-ajouter" checked />
        <label for="iut-ajouter"><b>Ajouter</b> un IUT sur la carte</label>

        <input type="radio" name="choix-iut" class="choix-modifier" id="iut-modifier" />
        <label for="iut-modifier"><b>Modifier</b> un IUT sur la carte</label>

        <input type="radio" name="choix-iut" class="choix-supprimer" id="iut-supprimer" />
        <label for="iut-supprimer"><b>Supprimer</b> un IUT sur la carte</label>
      </div>

      <div class="choix-select">
        <select>
          <option value="-1" selected>--- Choisir un IUT ---</option>
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
        <div>
          <div>
            <input type="text" name="nom" id="iut-nom" required />
            <label for="iut-nom">*Nom</label>
          </div>

          <div>
            <input type="text" name="universite" id="iut-universite" required />
            <label for="iut-universite"><i class="fas fa-graduation-cap"></i> *Université</label>
          </div>
        </div>

        <div>
          <div>
            <input type="text" name="region" id="iut-region" required />
            <label for="iut-region"><i class="fas fa-map-marker-alt"></i> *Région</label>
          </div>

          <div>
            <input type="text" name="ville" id="iut-ville" required />
            <label for="iut-ville"><i class="fas fa-map-marker-alt"></i> *Ville</label>
          </div>

          <div>
            <input type="text" name="adresse" id="iut-adresse" required />
            <label for="iut-adresse"><i class="fas fa-map-marker-alt"></i> *Adresse</label>
          </div>

          <div>
            <input type="text" name="code" id="iut-code" required />
            <label for="iut-code"><i class="fas fa-map-marker-alt"></i> *Code postal</label>
          </div>
        </div>

        <div>
          <div>
            <input type="number" name="longitude" id="iut-longitude" required />
            <label for="iut-longitude"><i class="fas fa-map-marker-alt"></i> *Longitude</label>
          </div>

          <div>
            <input type="number" name="latitude" id="iut-latitude" required />
            <label for="iut-latitude"><i class="fas fa-map-marker-alt"></i> *Latitude</label>
          </div>
        </div>

        <div>
          <div>
            <input type="url" name="site" id="iut-site" required />
            <label for="iut-site"><i class="fas fa-link"></i> *Site</label>
          </div>

          <div>
            <input type="url" name="gmaps" id="iut-gmaps" />
            <label for="iut-gmaps"><i class="fas fa-link"></i> Lien Google Maps</label>
          </div>
        </div>

        <div>
          <div>
            <input type="tel" name="tel" id="iut-tel" required />
            <label for="iut-tel"><i class="fas fa-phone"></i> *Téléphone</label>
          </div>

          <div>
            <input type="text" name="nom-resp" id="iut-nom-resp" required />
            <label for="iut-nom-resp"><i class="fas fa-user-tie"></i> *Nom du responsable</label>
          </div>

          <div>
            <input type="text" name="prenom-resp" id="iut-prenom-resp" required />
            <label for="iut-prenom-resp"><i class="fas fa-user-tie"></i> *Prénom du responsable</label>
          </div>

          <div>
            <input type="email" name="mail-resp" id="iut-mail-resp" required />
            <label for="iut-mail-resp"><i class="fas fa-at"></i> *Adresse mail du responsable</label>
          </div>
        </div>

        <div class="form-image">
          <input type="file" name="image" id="iut-image" class="inputfile" accept="image/*"/>
          <label for="iut-image"><i class="fas fa-file-image"></i> <span>*Logo</span></label>
        </div>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>
</fieldset>
