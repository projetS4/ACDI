<?php

require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('lib','Image.php'));
require_once File::build_path(array('model','ModelAdmin.php'));
require_once File::build_path(array('model','ModelCarrousel.php'));


class ControllerAdmin {

  // se connecter à l'espace admin
  static function logIn() {
    if(!is_null($id = myGet("id")) && !is_null($mdp = myGet("mdp"))) {

      $erreur = NULL;
      if(ModelAdmin::checkPassword($id,Security::chiffrer($mdp))) $_SESSION["admin"] = true;
      else $erreur = "<p class='error'>Mauvais identifiants.</p>";

      Controller::showAdmin($erreur);

    } else Controller::error(404);
  }

  /*** CARROUSEL ***/

  // ajouter ou modifier un slide
  static function updateSlide() {
    $message = "<p class='error'>Formulaire incomplet</p>";

    if(
      !is_null($titre_fr = myGet("titre_fr")) &&
      !is_null($titre_en = myGet("titre_en")) &&
      !is_null($lien = myGet("lien")) &&
      !is_null($action = myGet("n")) &&
      (
        ($action == "update" && !is_null($id = myGet("id"))) ||
        ($action == "save")
      )
    ) {

      $slide = new ModelCarrousel(array("titre_fr" => $titre_fr, "titre_en" => $titre_en, "lien" => $lien));

      // Modifier
      if($action == "update") {
        $message = "<p class='success'>Modification effectuée avec succès</p>";
        $slide->set('id',$id);
      }
      // Ajouter
      else $message = "<p class='success'>Ajout effectué avec succès</p>";

      // le slide n'a pas pu être enregistré
      if($slide->$action() === false) $message = "<p class='error'>Une erreur est survenue</p>";
      else { // le slide a pu être enregistré
        if($action == "save") $id = ModelCarrousel::selectLast()->get("id");

        // l'image n'a pas pu être enregistrée
        switch(Image::save($_FILES['image'], ModelCarrousel::getDir(), $id)) {
          case 1: $message = "<p class='error'>L'extension du fichier n'est pas autorisée</p>"; break;
          case 2: $message = "<p class='error'>Une erreur est survenue lors de la copie de l'image</p>"; break;
          case 3: if($action == "save") $message = "<p class='error'>Veuillez choisir une image</p>"; break;
        }
      }
    }

    Controller::showAdmin($message);
  }

  // supprimer un slide
  static function deleteSlide() {
    $message = "<p class='error'>Une erreur est survenue</p>";

    if(!is_null($id = myGet("id"))) {
      // si le slide est trouvé
      if(($slide = ModelCarrousel::select($id)) !== false) {
        // si le slide a pu être supprimé
        if($slide->delete() !== false && Image::delete(ModelCarrousel::getDir(), $id) !== false)
          $message = "<p class='success'>Suppression effectuée avec succès</p>";
      }
    }

    Controller::showAdmin($message);
  }

  /*** COMPTE ADMIN ***/

  // modifier le compte admin
  static function updateAdmin() {
    $message = "<p class='error'>Formulaire incomplet</p>";

    if(
      !is_null($id_old = myGet("id_old")) &&
      !is_null($mdp_old = myGet("mdp_old")) &&
      !is_null($id = myGet("id")) &&
      !is_null($mdp = myGet("mdp")) &&
      !is_null($mdp_confirm = myGet("mdp_confirm"))
    ) {

      $message = "<p class='error'>Les identifiants actuels sont incorrects.</p>";

      $mdp_old_c      = Security::chiffrer($mdp_old);
      $mdp_c          = Security::chiffrer($mdp);
      $mdp_confirm_c  = Security::chiffrer($mdp_confirm);

      if(ModelAdmin::checkPassword($id_old, $mdp_old_c)) {

        $message = "<p class='error'>Le nouveau mot de passe et la confirmation du nouveau mot de passe ne correspondent pas.</p>";

        if($mdp_c == $mdp_confirm_c) {

          $message = "<p class='success'>Modification effectuée avec succès. Veuillez vous connecter avec vos nouveaux identifiants.</p>";

          $admin = new ModelAdmin(array("identifiant" => $id, "mdp" => $mdp_c));

          if($admin->update() === false) $message = "<p class='error'>Une erreur est survenue.</p>";
          else Session::destroy(); // déconnexion

        }
      }
    }

    Controller::showAdmin($message);
  }

  /*** ADRESSE DE CONTACT ***/

  // modifier le compte admin
  static function updateContact() {
    $message = "<p class='error'>Formulaire incomplet</p>";

    if(
      !is_null($mail = myGet("mail"))
    ) {

      $message = "<p class='success'>Modification effectuée avec succès.</p>";

      $contact = new ModelContact(array("mail" => $mail));
      if($contact->update() === false) $message = "<p class='error'>Une erreur est survenue.</p>";
    }

    Controller::showAdmin($message);
  }

  /*** NOMBRES ***/

  // modifier les nombres de la page d'accueil
  static function updateNombres() {
    $message = "<p class='error'>Formulaire incomplet</p>";

    for($i = 1; $i <= 3; $i++) {

      if(
        !is_null($id = myGet("id$i")) &&
        !is_null($val = myGet("val$i")) &&
        !is_null($int_fr = myGet("intitule_fr$i")) &&
        !is_null($int_en = myGet("intitule_en$i"))
      ) {

        $message = "<p class='success'>Modification effectuée avec succès.</p>";

        $nombre = new ModelNombre(array(
          "id" => $id,
          "valeur" => $val,
          "intitule_fr" => $int_fr,
          "intitule_en" => $int_en
        ));

        if(!is_null($unite = myGet("unite$i"))) $nombre->set("unite", $unite);

        if($nombre->update() === false) $message = "<p class='error'>Une erreur est survenue.</p>";

      } else break;

    }

    Controller::showAdmin($message);
  }

  /*** TEMOIGNAGES ***/

  // afficher les champs préremplis pour modifier un témoignage
  static function inputTemoignages() {

    if(
      !is_null($id = myGet("id"))
    ) {

      $t = ModelTemoignage::select($id);
?>
<input type="hidden" name="id" value="<?= $t->get("id") ?>"/>

<div>

  <div>
    <input type="text" name="nom" id="testimonies-nom" value="<?= $t->get("nom") ?>" required />
    <label for="testimonies-nom">*Nom</label>
  </div>

  <div>
    <input type="text" name="prenom" id="testimonies-prenom" value="<?= $t->get("prenom") ?>" required />
    <label for="testimonies-prenom">*Prénom</label>
  </div>

  <div>
    <input type="text" name="age" id="testimonies-age" value="<?= $t->get("age") ?>" />
    <label for="testimonies-age">Âge</label>
  </div>

</div>

<div>

  <div>
    <input type="text" name="statut_fr" id="testimonies-statut_fr" value="<?= $t->get("statut_fr") ?>" required />
    <label for="testimonies-statut_fr">*Statut (fr)</label>
  </div>

  <div>
    <input type="text" name="statut_en" id="testimonies-statut_en" value="<?= $t->get("statut_en") ?>" required />
    <label for="testimonies-statut_en">*Statut (en)</label>
  </div>

</div>

<div>

  <div>
    <textarea id="testimonies-message_fr" name="message_fr" placeholder="*témoignage en français&hellip;" required><?= $t->get("message_fr") ?></textarea>
  </div>

  <div>
    <textarea id="testimonies-message_en" name="message_en" placeholder="*témoignage en anglais&hellip;" required><?= $t->get("message_en") ?></textarea>
  </div>

</div>
<?php

    } else echo "<p class='error'>Une erreur est survenue.</p>";

    exit;

  }

  // ajouter ou modifier un témoignage
  static function updateTemoignage() {
    $message = "<p class='error'>Formulaire incomplet</p>";

    if(
      !is_null($nom = myGet("nom")) &&
      !is_null($prenom = myGet("prenom")) &&
      !is_null($statut_fr = myGet("statut_fr")) &&
      !is_null($statut_en = myGet("statut_en")) &&
      !is_null($message_fr = myGet("message_fr")) &&
      !is_null($message_en = myGet("message_en")) &&
      !is_null($action = myGet("n")) &&
      (
        ($action == "update" && !is_null($id = myGet("id"))) ||
        ($action == "save")
      )
    ) {

      $temoignage = new ModelTemoignage(array(
        "nom" => $nom,
        "prenom" => $prenom,
        "statut_fr" => $statut_fr,
        "statut_en" => $statut_en,
        "message_fr" => $message_fr,
        "message_en" => $message_en
      ));

      // Modifier
      if($action == "update") {
        $message = "<p class='success'>Modification effectuée avec succès</p>";
        $temoignage->set('id',$id);
      }
      // Ajouter
      else $message = "<p class='success'>Ajout effectué avec succès</p>";

      if(!is_null($age = myGet("age"))) $temoignage->set('age',$age);

      // le témoignage n'a pas pu être enregistré
      if($temoignage->$action() === false) $message = "<p class='error'>Une erreur est survenue</p>";
      else { // le témoignage a pu être enregistré
        // Modifier
        if($action == "update") {
          if($_FILES['image']['name'] != "") Image::delete(ModelTemoignage::getDir(), $id);
        }
        // Ajouter
        else $id = ModelTemoignage::selectLast()->get("id");

        // l'image n'a pas pu être enregistrée
        switch(Image::save($_FILES['image'], ModelTemoignage::getDir(), $id)) {
          case 1: $message = "<p class='error'>L'extension du fichier n'est pas autorisée</p>"; break;
          case 2: $message = "<p class='error'>Une erreur est survenue lors de la copie de l'image</p>"; break;
        }

      }
    }

    Controller::showAdmin($message);
  }

  // supprimer un témoignage
  static function deleteTemoignage() {
    $message = "<p class='error'>Une erreur est survenue</p>";

    if(!is_null($id = myGet("id"))) {
      // si le témoignage est trouvé
      if(($temoignage = ModelTemoignage::select($id)) !== false) {
        // si le témoignage a pu être supprimé
        if($temoignage->delete() !== false && Image::delete(ModelTemoignage::getDir(), $id) !== false)
          $message = "<p class='success'>Suppression effectuée avec succès</p>";
      }
    }

    Controller::showAdmin($message);
  }

  /*** PARTENAIRES ***/

  /*** CARTE ***/

  /*** IUT ***/

  /*** LP ***/

}
?>
