<script>
  $(function() {

    var map = AmCharts.makeChart("map",{
      "type": "map",
      "pathToImages": "http://www.amcharts.com/lib/3/images/",
      "addClassNames": true,
      "fontSize": 15,
      "color": "#FFFFFF",
      "projection": "mercator",
      "backgroundAlpha": 0,
      "preventDragOut": true,
      "panEventsEnabled":false,
      "dataProvider": {
        "zoomLevel": .85,
        "map": "france2016Low",
        "getAreasFromMap": true,
        "images": <?= ControllerMap::show_IUT(); ?>,
        "areas": [
          {
            "id": "FR-GES",
            "title": "Grand Est",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-NAQ",
            "title": "Nouvelle-Aquitaine",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-ARA",
            "title": "Auvergne-Rhône-Alpes",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-BFC",
            "title": "Bourgogne-Franche-Comté",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-BRE",
            "title": "Bretagne",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-CVL",
            "title": "Centre-Val de Loire",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-COR",
            "title": "Corse",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-IDF",
            "title": "Île-de-France",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-OCC",
            "title": "Occitanie",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-HDF",
            "title": "Hauts-de-France",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-NOR",
            "title": "Normandie",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-PDL",
            "title": "Pays de la Loire",
            "color": "rgba(238,240,242,1)"
          },
          {
            "id": "FR-PAC",
            "title": "Provence-Alpes-Côte d'Azur",
            "color": "rgba(238,240,242,1)"
          }
        ]
      },
      "areasSettings": {
        "outlineColor": "rgba(198,199,196,.7)",
        "rollOverOutlineColor": "rgba(255,255,255,.3)",
        "rollOverBrightness": 20,
        "selectedBrightness": 20,
        "unlistedAreasAlpha": 0,
        "unlistedAreasOutlineAlpha": 0,
        "selectable": true
      },
      "imagesSettings": {
        "alpha": 1,
        "color": "rgba(142, 124, 147, 1)",
        "outlineAlpha": .5,
        "outlineThickness": 1,
        "rollOverOutlineAlpha": 0,
        "outlineColor": "rgba(62, 44, 90, 1)",
        "rollOverBrightness": 20,
        "selectedColor": "rgba(163,187,7,1)",
        "selectable": true
      },
      "zoomControl": {
        "zoomControlEnabled": true,
        "homeButtonEnabled": true,
        "panControlEnabled": false,
        "right": 30,
        "bottom": 100,
        "minZoomLevel": 0.25,
        "gridHeight": 100,
        "gridAlpha": .2,
        "draggerAlpha": 1,
        "buttonCornerRadius": 2,
        "buttonBorderColor":"#C6C7C4",
        "buttonFillColor":"#EEF0F2",
        "buttonIconColor":"#3E2C5A"
      }
    });

    // Personnaliser l'événement "au clic sur un marqueur de la carte"
    map.addListener("clickMapObject", showInfo);

    // fonction : afficher les informations liées à une région ou un IUT
    function showInfo(event) {

      // ouverture sur le côté du panneau d'informations (s'il n'était pas déjà ouvert)
      $(".info-wrapper").effect('slide', { direction: 'left', mode: 'show' }, 500);

      // cacher le contenu précédent
      $("#info").html('<i class="loading fas fa-spinner fa-pulse"></i>');
      $("#info").hide();

      // charger le nouveau contenu demandé à l'aide du requête AJAX
      var param = "c=map&a=show_infos&nom="+event.mapObject.title+"&type="+event.mapObject.objectType;
      $("#info").load("index.php",param, function(data) { $("#info").html(data); }); // requête AJAX

      // affichage des informations sur le panneau latéral
      $("#info").fadeIn();
    }


    $(".fermer").click(function() {
      if($("#info .iut-lp").is(":visible")) {
        $("#info .iut-lp").hide();
        $("#info .iut-list_lp").fadeIn();
      } else if($("#info .iut-list_lp").is(":visible")) {
        $("#info .iut-list_lp").hide();
        $("#info .iut").fadeIn();
      } else {
        $(".info-wrapper").effect('slide', { direction: 'left', mode: 'hide' }, 500);
      }

    });

    $(document).on("click", ".iut .lp", function() {
      $("#info .iut").hide();
      $("#info .iut-list_lp").fadeIn();
    });

    $(document).on("click", ".iut-list_lp button", function() {
      $("#info .iut-lp").hide();
      $("#info .iut-list_lp").hide();
      $("#"+$(this).attr("class")).show();
    });

    $(document).on("click",".list", function() {
      var $b = $(this).find("b");
      var clss = $b.attr("class");
      if(clss == "b-lp") {
        $b.removeClass("b-lp");
        $b.addClass("b-iut");
        $b.text("<?= ControllerMap::text_lang()["iut"]; ?>");
        $("#info .list-iut").hide();
        $("#info .list-lp").fadeIn();
      } else {
        $b.removeClass("b-iut");
        $b.addClass("b-lp");
        $b.text("<?= ControllerMap::text_lang()["lp"]; ?>");
        $("#info .list-lp").hide();
        $("#info .list-iut").fadeIn();
      }
    });

    // Lors d'un clic sur un IUT ne figurant pas sur la carte
    $(document).on("click",".list-iut ul button", function() {
      var iut = $(this).text(); // récupérer le nom de l'IUT sélectionné
      clickIUT(iut); // simuler un clic sur la carte
    });

    // Lors d'un clic sur une LP ne figurant pas sur la carte
    $(document).on("click",".list-lp ul button", function() {
      var id_lp = $(this).attr("class"); // récupérer l'id de la LP
      $.get("index.php", {
              c: "map", // controller
              a: "IUT_by_LP", // action
              lp: id_lp },
              function(iut) {
                clickIUT(iut); // simuler un clic sur la carte
              });
    });

    // sumuler le clic sur le bouton
    if($(".iut-proche").is(".triggered")) { geo(); }

    // Lors d'un clic sur le bouton "trouver mon IUT le plus proche"
    $(".iut-proche").click(function() { geo(); });

    function geo() {
      // si la géolocalisation est activée sur le navigateur du client
      if ("geolocation" in navigator) {

        // récupérer la position du client
        navigator.geolocation.getCurrentPosition(function(position) {
          // effectuer une requête AJAX pour récupérer l'IUT le plus proche
          $.get("index.php", {
                  c: "map", // controller
                  a: "IUT_proche", // action
                  lat: position.coords.latitude,
                  long: position.coords.longitude },
                  function(iut) {
                    clickIUT(iut); // simuler un clic sur la carte
                  });
        });
      } else {
        // afficher une erreur
        alert("<?= ControllerMap::text_lang()["geo"]; ?>");
      }
    }

    // Simuler un clic sur le marqueur d'un IUT
    function clickIUT(nom) {

      // Parcourir les marqueurs sur la carte
      for(var x in map.dataProvider.images) {

          var image = map.dataProvider.images[x]; // récupérer le marqueur en cours

          // si le marqueur correspond à l'IUT demandé
          if(image.title == nom)
            map.clickMapObject(image); // simuler le clic
      }
    }



  });
</script>
