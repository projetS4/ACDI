<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" type="image/x-icon" href="favicon.ico"/>

  <script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
  <script src="js/jquery-ui/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="font/fontawesome-free-5.4.1-web/css/all.css"/>
  <link rel="stylesheet/less" type="text/css" href="css/style.less" />
  <script src="js/less.min.js" ></script>

  <!-- menu burger - elastic -->
  <script src="js/menu-burger/snap.svg-min.js"></script>

  <!-- recaptcha -->
	<script src="https://www.google.com/recaptcha/api.js"></script>

  <!-- sources relatifs à la page -->
  <?php File::require_file(File::build_path(array("view", $dir, "head.php"))); ?>

  <title><?= $title ?></title>
</head>

<body>
  <div class="container">
    <!-- menu burger -->
    <?php require File::build_path(array("view", "template", "nav", "burger.php")); ?>

    <div class="content-wrap">
      <div class="content">

        <!-- header -->
        <?php require File::build_path(array("view", "template", "header.php")); ?>

        <!-- menu normal -->
        <?php require File::build_path(array("view", "template", "nav", "normal.php")); ?>

        <main>
          <!-- breadcrumb -->
          <div id="breadcrumb">

            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
              <?= $breadcrumbs ?>
            </ol>

          </div><!-- \.breadcrumb -->

          <!-- contenu de la page -->
          <?php require File::build_path(array("view", $dir, "$view.php")); ?>
        </main>

        <!-- footer -->
        <?php require File::build_path(array("view", "template", "footer.php")); ?>

      </div>
    </div><!-- /content-wrap -->

  </div><!-- /container -->


  <!-- menu burger - elastic -->
  <script src="js/menu-burger/classie.js"></script>
  <script src="js/menu-burger/main3.js"></script>

  <!-- barre de navigation -->
  <script src="js/nav.js"></script>

  <!-- barre de recherche -->
  <script src="js/search.js"></script>

  <!-- retour en haut de la page -->
  <script src="js/go-up.js"></script>

  <!-- js relatif à la page -->
  <?php File::require_file(File::build_path(array("view", $dir, "js.php"))); ?>
</body>

</html>
