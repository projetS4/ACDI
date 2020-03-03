<section id="connexion">
  <header>
    <h2>Espace admin</h2>
    <div class="bar"></div>
  </header>

  <?= $message ?>

  <form method="post" action="index.php?c=admin&a=logIn" enctype="multipart/form-data">
    <fieldset>
      <legend>Connexion à l'espace admin</legend>

      <div class="fieldset-content">

        <div>
          <input type="text" name="id" id="id" required />
          <label for="id">Identifiant</label>
        </div>

        <div>
          <input type="password" name="mdp" id="mdp" required />
          <label for="mdp"><i class="fas fa-lock"></i> Mot de passe</label>
        </div>

        <div>
          <button type="submit">Valider</button>
        </div>

      </div>

    </fieldset>
  </form>
</section>
