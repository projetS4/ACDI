<fieldset class="admin-contact">
  <legend>Gestion de l'adresse de contact</legend>

  <div class="fieldset-content">

    <form method="post" action="index.php?c=admin&a=updateContact">
      <div>
        <input type="mail" name="mail" id="contact-mail" value="<?= $contact["mail"] ?>" required />
        <label for="contact-mail">*<i class="fas fa-at"></i> adresse mail</label>
      </div>

      <button type="submit">Valider</button>
    </form>

  </div>

</fieldset>
