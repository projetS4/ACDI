<section id="admin">
  <header>
    <h2>Espace admin</h2>
    <div class="bar"></div>
  </header>

  <?= $message ?>

  <p>Les champs précédés d'un astérisque (*) sont obligatoires.</p>

  <div class="admin-fieldset">

    <?php require File::build_path(array("view","admin","form","id.php")); ?>

    <?php require File::build_path(array("view","admin","form","contact.php")); ?>

    <?php require File::build_path(array("view","admin","form","carrousel.php")); ?>

    <?php require File::build_path(array("view","admin","form","partenaires.php")); ?>

    <?php require File::build_path(array("view","admin","form","temoignages.php")); ?>

    <fieldset class="admin-map">
      <legend>Gestion de la carte des IUT</legend>

      <div class="fieldset-content">

        <?php require File::build_path(array("view","admin","form","iut.php")); ?>

        <?php require File::build_path(array("view","admin","form","lp.php")); ?>

      </div>
    </fieldset>

    <?php require File::build_path(array("view","admin","form","nombres.php")); ?>

  </div>

</section>
