<header id="header">

  <!-- Logo -->
  <a href="index.php" id="logo"><img src="img/logo.png" alt="logo"/></a>

  <!-- Barre de recherche -->
  <form method="get" action="index.php">
    <input type="hidden" name="a" value="search" />
    <input type="search" name="s" placeholder="<?= Template::search() ?>&hellip;"/>
    <button type="submit"><i class="fas fa-search"></i></button>
  </form>

  <!-- Navigation annexe -->
  <nav>
    <ul>
      <li><a href="index.php?a=showCompany"><i class="fas fa-briefcase"></i> <span><?= Template::small_nav()["ent"] ?></span></a></li>
      <li><a href="index.php?a=showMap"><i class="fas fa-map-marker-alt"></i> <span><?= Template::small_nav()["carte"] ?></span></a></li>
      <li>
        <a href="index.php?a=changeLang&lang=fr" title="français"><img src="img/fr.png" alt="fr"/></a>
        <a href="index.php?a=changeLang&lang=en" title="english"><img src="img/en.png" alt="en"/></a>
      </li>
    </ul>
  </nav>
</header>
