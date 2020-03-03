<fieldset class="admin-compte">
  <legend>Modifier les identifiants du compte admin</legend>

  <div class="fieldset-content">

    <form method="post" action="index.php?c=admin&a=updateAdmin">

      <p>Veuillez renseigner ci-dessous vos identifiants actuels afin de confirmer votre identité.</p>

      <div>

        <div>
          <input type="text" name="id_old" id="compte-id_old" required />
          <label for="compte-id_old">*Identifiant actuel</label>
        </div>

        <div>
          <input type="password" name="mdp_old" id="compte-mdp_old" required />
          <label for="compte-mdp_old">*Mot de passe actuel</label>
        </div>

      </div>

      <p>Veuillez renseigner ci-dessous les nouveaux identifiants que vous avez choisis.</p>

      <div>
        <input type="text" name="id" id="compte-id" required />
        <label for="compte-id">*Nouvel identifiant</label>
      </div>

      <div>
        <input type="password" name="mdp" id="compte-mdp" required />
        <label for="compte-mdp">*Nouveau mot de passe</label>
      </div>

      <div>
        <input type="password" name="mdp_confirm" id="compte-mdp_confirm" required />
        <label for="compte-mdp_confirm">*Confirmation du nouveau mot de passe</label>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>

</fieldset>
